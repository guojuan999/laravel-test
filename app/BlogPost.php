<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\HybridRelations;


class BlogPost extends Eloquent
{
    use HybridRelations;
    protected $connection = 'mongodb';

    
    public function user()
    {
        return $this->belongsTo('User');
    }
}
