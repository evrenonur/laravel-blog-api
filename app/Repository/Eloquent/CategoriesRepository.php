<?php

namespace App\Repository\Eloquent;

use App\Helpers\Helpers;
use App\Models\Categories;

class CategoriesRepository implements \App\Repository\CategoriesRepositoryInterface
{

    public function all()
    {
        $categories = Categories::active()->get();
        if ($categories) {
            $data = [];
            foreach ($categories as $category) {
                $data[] = [
                    'id' => $category->id,
                    'category_name' => $category->category_name,
                    'category_image' => asset('categories/' . $category->category_image),

                ];
            }
            return $data;
        } else {
            return false;
        }
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function posts($id)
    {
        $category = Categories::findOrfail($id);
        if ($category) {
            $posts = $category->blogPosts()->published()->get();
            $data = [];
            foreach ($posts as $post) {
                $data[] = [
                    'id' => $post->id,
                    'title' => $post->title,
                    'content' => $post->content,
                    'excerptContent'=> Helpers::shortText($post->content, 100),
                    'category' => $post->category->category_name,
                    'category_id' => $post->category->id,
                    'image' => asset('uploads/' . $post->image),
                    'date' => $post->created_at->translatedFormat('d F Y'),
                    'author' => "Onur Evren",
                    'commentCount' => $post->comments->count(),
                ];
            }
            return $data;
        } else {
            return false;
        }
    }
}
