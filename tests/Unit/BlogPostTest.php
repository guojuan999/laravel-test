<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\BlogPost;

class BlogPostTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $blogpost = BlogPost::where('user_id', '=', 1)->firstOrFail();
        $user = $blogpost->user()->firstorFail();
        $this->assertTrue($user->hasRole("admin"));
    }
}
