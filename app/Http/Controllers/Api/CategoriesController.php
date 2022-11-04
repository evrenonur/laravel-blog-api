<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\CategoriesRepository;
use App\Repository\ReponseRepositoryInterface;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private ReponseRepositoryInterface $reponseRepository;
    private CategoriesRepository $categoriesRepository;

    public function __construct(ReponseRepositoryInterface $reponseRepository,CategoriesRepository $categoriesRepository)
    {
        $this->reponseRepository = $reponseRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index()
    {
        $categories = $this->categoriesRepository->all();
        return $this->reponseRepository->sendResponse($categories);
    }

    public function categoryPosts($id)
    {
        $category = $this->categoriesRepository->posts($id);
        return $this->reponseRepository->sendResponse($category, 'Posts by category', 200);
    }
}
