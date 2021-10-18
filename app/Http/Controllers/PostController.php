<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with("kategori")->latest()->filter(request(["search", "kategori"]))->paginate(6)->withQueryString();
        return view("posts.index", [
            "title" => "Berita & Pengumuman",
            "posts" => $posts
        ]);
    }

    public function show(Post $post)
    {
        $latestPosts = Post::with("kategori")->latest()->get()->filter(function ($latest) use ($post) {
            return $latest->id != $post->id;
        })->take(3);

        return view("posts.show", [
            "title" => $post->judul,
            "post" => $post,
            "latestPosts" => $latestPosts
        ]);
    }
}
