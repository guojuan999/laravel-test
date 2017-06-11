<?php

namespace App;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\BlogPost;

//class User extends Authenticatable
class User extends \Eloquent implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use Notifiable;
    use HybridRelations;
    
    /**
     * The name of the database connection to use.
     * @var string
    ]*/
    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function blogposts()
    {
        return $this->hasMany(BlogPost::class);
    }
    
    /**
     * if current user is the role
     * @param string $role
     * @return bealean
     */
    public function hasRole($role)
    {
        return $this->attributes['role'] == $role;
    }
}
