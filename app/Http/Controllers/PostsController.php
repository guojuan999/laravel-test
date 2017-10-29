<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\BlogPostRequest;

class PostsController extends Controller
{
    /**
     * pagingation per page for displaying blogs
     */
    const pagelimit = 5;
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * get all App/BlogPost by pagination
     * @param int $page
     */
    public function getBlogs()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(self::pagelimit);
        return view('blogs/blog', ['posts' => $posts]);
    }
    
    /**
     * get App/BlogPost by id
     * @param string $id
     */
    public function getBlogById($id)
    {
        if (Cache::has($id)) {
            $post = Cache::get($id);
        } else {
            $post = BlogPost::where('_id', '=', $id)->firstOrFail();
            Cache::put($id, $post, 10);
        }
        return view('blogs/view', ['post' => $post]);
    }
    
    /**
     * save App/BlogPost
     * @param Request $request
     */
    public function save(BlogPostRequest $request)
    {
        $redirect = $this->isAccessable();
        if ($redirect) {
            return redirect($redirect);
        }
        
        $id = $request->input('id');
        $user = Auth::user();
        if ($id) {
            $post = BlogPost::find($id);
            
        } else {
            $post = new BlogPost();
            $post->user_id = $user->id;
        }
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->update_user_id = $user->id;
        $post->save();
        $msg = $id ? "updte blog post" : "save blog post";
        return redirect('blogs')
                ->with('success', 'You have been successfully '.$msg);

    }
    
    /**
     * delete Blog Post record
     * @param string $id
     * @return void
     */
    public function delete($id)
    {
        $redirect = $this->isAccessable();
        if ($redirect) {
            return redirect($redirect);
        }
        $return = BlogPost::where('_id', $id)
                                ->delete();
        
        return redirect('blogs')
                ->with('success', 'You have been successfully deleted blog post');

    }
    
    /**
     * add Blog Post record
     */
    public function add()
    {
        $redirect = $this->isAccessable();
        if ($redirect) {
            return redirect($redirect);
        }
        $post = (object) array('id'=>'', 'title'=>'', 'content'=>'');
        return view('blogs/edit', ['post' => $post]);
    }
    
    /**
     * edit App/Message by id
     * @param string $id
     */
    public function edit($id)
    {
        $redirect = $this->isAccessable();
        if ($redirect) {
            return redirect($redirect);
        }
        $post = BlogPost::where('_id', '=', $id)->firstOrFail();
        return view('blogs/edit', ['post' => $post]);
    }
    
    /**
     * check if the user is admin user
     */
    private function isAccessable()
    {
        if (!$user->hasRole('admin')) {
            return "/blogs";
        }
        return '';
    }
}
