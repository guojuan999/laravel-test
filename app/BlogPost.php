<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\HybridRelations;


class BlogPost extends Eloquent
{
    use HybridRelations;
    
    /**
     * The name of the database connection to use.
     * @var string
    ]*/
    protected $connection = 'mongodb';
    
    public function user()
    {
        return $this->belongsTo('User');
    }
}
