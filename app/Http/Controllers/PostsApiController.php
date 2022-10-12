<?php

namespace App\Http\Controllers;

use App\Models\BlogPosts;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsApiController extends Controller
{

    public function sendResponse($data, $message = "success", $status = 200)
    {
        $response = [
            'data' => $data,
            'message' => $message
        ];

        return response()->json($response, $status);
    }

    public function sendError($errorData, $message, $status = 500)
    {
        $response = [];
        $response['message'] = $message;
        if (!empty($errorData)) {
            $response['data'] = $errorData;
        }

        return response()->json($response, $status);
    }


    public function index()
    {
        $posts = BlogPosts::published()->with('category')->get();
        $data = [];
        foreach ($posts as $post) {
            $data[] = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'category' => $post->category->category_name,
                'category_id' => $post->category->id,
                'image' => asset('uploads/' . $post->image),
                'created_at' => $post->created_at,
            ];
        }
        return $this->sendResponse($data);
    }

    public function post($id){
        $post = BlogPosts::findOrfail($id);
        if ($post->is_published == 1) {
            $data = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'category' => $post->category->category_name,
                'category_id' => $post->category->id,
                'views' => $post->views_count,
                'image' => asset('uploads/' . $post->image),
                'created_at' => $post->created_at,
            ];
            $post->increment('views_count');
            return $this->sendResponse($data);
        } else {
            return $this->sendError([], 'Post not found', 404);
        }
    }

    public function categories(){
        $categories = Categories::active()->get();
        if ($categories) {
            $data = [];
            foreach ($categories as $category) {
                $data[] = [
                    'id' => $category->id,
                    'category_name' => $category->category_name,
                    'category_image' => asset('uploads/' . $category->category_image),

                ];
            }
            return $this->sendResponse($data);
        } else {
            return $this->sendError([], 'No categories found', 404);
        }
    }

    public function categoryPosts($id){
        $category = Categories::findOrfail($id);
        if ($category) {
            $posts = $category->blogPosts()->published()->get();
            $data = [];
            foreach ($posts as $post) {
                $data[] = [
                    'id' => $post->id,
                    'title' => $post->title,
                    'content' => $post->content,
                    'category' => $post->category->category_name,
                    'category_id' => $post->category->id,
                    'image' => asset('uploads/' . $post->image),
                    'created_at' => $post->created_at,
                ];
            }
            return $this->sendResponse($data);
        } else {
            return $this->sendError([], 'No posts found', 404);
        }
    }

    public function comments($id){
        $post = BlogPosts::findOrfail($id);
        if ($post) {
            $comments = $post->comments()->active()->get();
            $data = [];
            foreach ($comments as $comment) {
                $data[] = [
                    'id' => $comment->id,
                    'name' => $comment->user->name,
                    'comment' => $comment->body,
                    'created_at' => $comment->created_at,
                ];
            }
            return $this->sendResponse($data);
        } else {
            return $this->sendError([], 'No comments found', 404);
        }
    }

    public function comment($id){
        $post = BlogPosts::findOrfail($id);
        if ($post) {
            $validator = Validator::make(request()->all(), [
                'body' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError([], 'Validation Error', 422);
            }
            $comment = $post->comments()->create([
                'body' => request()->body,
                'user_id' => auth()->user()->id,
            ]);
            $data = [
                'id' => $comment->id,
                'name' => $comment->user->name,
                'comment' => $comment->body,
                'created_at' => $comment->created_at,
            ];
            return $this->sendResponse($data);
        } else {
            return $this->sendError([], 'No comments found', 404);
        }

    }

}
