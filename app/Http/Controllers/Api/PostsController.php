<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Repository\Eloquent\PostsRepository;
use App\Repository\PostsRepositoryInterface;
use App\Repository\ReponseRepositoryInterface;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    private  $postsRepository;
    private  $reponseRepository;

    public function __construct(PostsRepository $postsRepository, ReponseRepositoryInterface $reponseRepository)
    {
        $this->postsRepository = $postsRepository;
        $this->reponseRepository = $reponseRepository;
    }


    public function index()
    {
        $posts = $this->postsRepository->getPosts();
        if ($posts) {
            return $this->reponseRepository->sendResponse($posts);
        }else{
            return $this->reponseRepository->sendError([],'No posts found', 404);
        }
    }

    public function post($id)
    {
        $post = $this->postsRepository->getPost($id);
        if ($post) {
            return $this->reponseRepository->sendResponse($post);
        }else{
            return $this->reponseRepository->sendError([],'No post found', 404);
        }
    }

    public function sliderPosts()
    {
        $posts = $this->postsRepository->sliderPosts();
        if ($posts) {
            return $this->reponseRepository->sendResponse($posts);
        }else{
            return $this->reponseRepository->sendError([],'No posts found', 404);
        }
    }

}
