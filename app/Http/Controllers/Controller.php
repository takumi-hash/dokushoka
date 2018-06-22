<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function count_posts($user) {
        $count_posts = $user->posts()->count();
        return [
            'count_posts' => $count_posts,
        ];
    }
    public function count_followings($user) {
        $count_followings = $user->followings()->count();
        return [
            'count_followings' => $count_followings,
        ];
    }
    public function count_followers($user) {
        $count_followers = $user->followers()->count();
        return [
            'count_followers' => $count_followers,
        ];
    }
    
    public function count_favorites($user){
        $count_favorites = $user->favorites()->count();
        return [
            'count_favorites' => $count_favorites,
        ];
    }
}