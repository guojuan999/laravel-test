<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BlogPost;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    const limit = 5;
    
    /**
     * get all App/Message by pagination
     * @param int $page
     */
    public function getBlogs()
    {
        if(!Auth::check()) {
            return redirect('/');
        }
        $m = new BlogPost();
        $posts = BlogPost::paginate(self::limit);
        $userIds = array();
        foreach ($posts as $post) {
            $userIds[] = $post->users_id;
        }
        $users = User::findMany(array_unique($userIds));
        $usersById = array();
        foreach($users as $user){
            $usersById[$user->id] = $user;
        }
        $currentUser = Auth::user();
        return view('blogs/blog' , ['posts' => $posts, 'users'=>$usersById,'isAdmin' =>(boolean)$currentUser->is_admin]);
    }
    
    /**
     * get App/Message by id
     * @param string $id
     */
    public function getBlogById($id)
    {
        $post = BlogPost::where('_id', '=', $id)->firstOrFail();
        return view('blogs/view' , ['post' => $post]);
    }
    
    /**
     * save App/Message
     * @param Request $request
     */
    public function save(Request $request){
         $this->validate($request, [
        'title' => 'required|max:255',
        'content' => 'required',
    ]);
        $id = $request->input('id');
        $user = Auth::user();
        if ($id) {
            $post = BlogPost::find($id);
            
        } else {
            $post = new BlogPost();
            $post->users_id = $user->id;
        }
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->update_users_id = $user->id;
        $post->save();
        
        return redirect('blogs')
                ->with('success','You have been successfully update data');

    }
    
    /**
     * delete Message record
     * @param string $id
     * @return type
     */
    public function delete($id){
        $this->isAccessable();
        $return = BlogPost::where('_id', $id)
                                ->delete();
        
        return redirect('blogs')
                ->with('success','You have been successfully deleted data');

    }
    
    /**
     * add Message record
     */
    public function add()
    {
        $this->isAccessable();
        $post = (object) array('id'=>'', 'title'=>'', 'content'=>'');
        
        return view('blogs/edit', ['post' => $post]);
    }
    
    /**
     * edit App/Message by id
     * @param string $id
     */
    public function edit($id){
        $this->isAccessable();
        $post = BlogPost::where('_id', '=', $id)->firstOrFail();
        return view('blogs/edit', ['post' => $post]);
    }
    
    /**
     * check if the user is admin user
     */
    private function isAccessable()
    {
        $user = Auth::user();
        if (!$user){
            return redirect('/');
        } elseif ($user->is_admin) {
            return redirect("/blogs");
        }
    }
}
