<?php

namespace App\Repository;

interface PostsRepositoryInterface
{
    public function getPosts();
    public function getPost($id);
    public function createPost($data);
    public function updatePost($id, $data);
    public function deletePost($id);
    public function getbyId($id);
}
