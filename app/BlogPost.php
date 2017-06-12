<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use App\User;

class BlogPost extends Eloquent
{
    use HybridRelations;
    
    /**
     * The name of the database connection to use.
     * @var string
    ]*/
    protected $connection = 'mongodb';
    
    
    
    public function getId()
    {
        return $this->attributes['_id'];
    }
    /**
     * Set the blog post title.
     *
     * @param  string  $value
     * @return void
     */
    public function setTitle($value)
    {
        $this->attributes['title'] = $value;
    }
    
    /**
     * return the blog post title
     * @return string
     */
    public function getTitle()
    {
        return $this->attributes['title'];
    }
    
    /**
     * set blog post content
     * @param string $content
     */
    public function setContent($value)
    {
        $this->attributes['content'] = $value;
    }
    
    /**
     * set blog post content
     * @return string
     */
    public function getContent()
    {
        return $this->attributes['content'];
    }
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
