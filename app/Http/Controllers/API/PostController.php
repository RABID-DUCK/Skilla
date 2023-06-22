<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Posts::with('categories')->get()->map(function ($post){
            $post['categories'] = $post->categories->title;
            return $post;
        });

        return response()->json($posts);
    }

    public function filter(Request $request){
        if (isset($request->date_start) && isset($request->date_end) && isset($request->category)) {
            $posts = Posts::with('categories')
                ->join('categories', 'categories.id', '=', 'posts.category_id')
                ->select('posts.*', 'categories.title as category_title')
                ->whereBetween('posts.created_at', [$request->date_start . " 00:00:00", $request->date_end . " 00:00:00"])
                ->where('category_id', $request->category)
                ->get()
                ->map(function ($post) {
                    $post['category'] = $post->category_title;
                    unset($post->category_title);
                    return $post;
                });

            return response()->json($posts);
        }

        if (isset($request->date_start) && isset($request->date_end)){
            $posts = Posts::with('categories')
                ->join('categories', 'categories.id', '=', 'posts.category_id')
                ->select('posts.*', 'categories.title as category_title')
                ->whereBetween('posts.created_at', [$request->date_start . " 00:00:00", $request->date_end . " 00:00:00"])
                ->get()
                ->map(function ($post){
                    $post['category'] = $post->category_title;
                    unset($post->category_title);
                    return $post;
                });

            return response()->json($posts);
        }

        if (isset($request->category)){
            $posts = Posts::with('categories')
                ->join('categories', 'categories.id', '=', 'posts.category_id')
                ->select('posts.*', 'categories.title as category_title')
                ->where('category_id', $request->category)
                ->get()
                ->map(function ($post){
                    $post['category'] = $post->category_title;
                    unset($post->category_title);
                    return $post;
                });
            return response()->json($posts);
        }
    }
}
