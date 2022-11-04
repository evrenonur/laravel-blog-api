<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\CommentsRepository;
use App\Repository\Eloquent\ResponseRepository;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    private CommentsRepository $commentsRepository;
    private ResponseRepository $responseRepository;

    public function __construct(CommentsRepository $commentsRepository, ResponseRepository $responseRepository)
    {
        $this->commentsRepository = $commentsRepository;
        $this->responseRepository = $responseRepository;
    }

    public function comments($id){
        $comments = $this->commentsRepository->getComments($id);
        return $this->responseRepository->sendResponse($comments);
    }

    public function createComment($id){
        $validator = Validator::make(request()->all(), [
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->responseRepository->sendError($validator->errors(), 'Validation Error.', 400);
        }
        $data = request()->all();
        $data['post_id'] = $id;
        $comment = $this->commentsRepository->createComment($data);
        if ($comment) {
            return $this->responseRepository->sendResponse([], 'Comment created successfully');
        } else {
            return $this->responseRepository->sendError([], 'No post found', 404);
        }
    }

}
