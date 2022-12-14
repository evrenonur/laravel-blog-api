<?php

namespace App\Repository\Eloquent;

use App\Helpers\Helpers;
use App\Models\BlogPosts;
use App\Repository\PostsRepositoryInterface;

class PostsRepository implements PostsRepositoryInterface
{


    public function getPosts()
    {
        $data = [];
        $sliders = BlogPosts::where('is_slider', 1)->published()->limit(3)->get();
        $id = array();
        foreach ($sliders as $slider) {
            $id[] = $slider->id;
        }

        $posts = BlogPosts::published()->notslider($id)->with('category')->get();
        foreach ($posts as $post) {
            $data[] = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'excerptContent' => Helpers::shortText($post->content, 100),
                'category' => $post->category->category_name,
                'category_id' => $post->category->id,
                'is_slider' => $post->is_slider,
                'image' => asset('uploads/' . $post->image),
                'date' => $post->created_at->translatedFormat('d F Y'),
                'author' => "Onur Evren",
                'commentCount' => $post->comments->count(),
            ];
        }

        return $data;

    }

    public function getPost($id)
    {
        $post = BlogPosts::findOrfail($id);
        if ($post->is_published == 1) {
            $data = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'excerptContent'=> Helpers::shortText($post->content, 100),
                'category' => $post->category->category_name,
                'category_id' => $post->category->id,
                'views' => $post->views_count,
                'image' => asset('uploads/' . $post->image),
                'date' => $post->created_at->translatedFormat('d F Y'),
                'author' => "Onur Evren",
                'commentCount' => $post->comments->count(),
            ];
            $post->increment('views_count');
            return $data;
        } else {
            return false;
        }
    }

    public function createPost($data)
    {
        // TODO: Implement createPost() method.
    }

    public function updatePost($id, $data)
    {
        // TODO: Implement updatePost() method.
    }

    public function deletePost($id)
    {
        // TODO: Implement deletePost() method.
    }

    public function getbyId($id)
    {
        $post = BlogPosts::findOrfail($id);
        return $post ? $post : false;
    }

    public function sliderPosts()
    {
        $sliders = BlogPosts::slider()->published()->get();
        $sliderPosts = [];
        foreach ($sliders as $slider) {
            $sliderPosts[] = [
                'id' => $slider->id,
                'title' => $slider->title,
                'content' => $slider->content,
                'excerptContent' => Helpers::shortText($slider->content, 100),
                'category' => $slider->category->category_name,
                'category_id' => $slider->category->id,
                'is_slider' => $slider->is_slider,
                'image' => asset('uploads/' . $slider->image),
                'date' => $slider->created_at->translatedFormat('d F Y'),
                'author' => "Onur Evren",
                'commentCount' => $slider->comments->count(),
            ];
        }
        return $sliderPosts;
    }
}
