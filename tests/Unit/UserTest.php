<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::where('id', '=', 1)->firstOrFail();
        $this->assertTrue($user->hasRole('admin'));
        $user = User::where('id', '=', 2)->firstOrFail();
        $this->assertFalse($user->hasRole('admin'));
    }
    
    /**
     * 
     */
    public function getHasRole()
    {
        $user = User::where('_id', '=', 1)->firstOrFail();
        $this->assertTrue($user->hasRole('admin'));
    }
}
