<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('posts'));
    }
}
