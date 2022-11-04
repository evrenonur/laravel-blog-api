<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\QuestionsRepository;
use App\Repository\Eloquent\ResponseRepository;
use App\Repository\QuestionsRepositoryInterface;
use App\Repository\ReponseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class QuestionsController extends Controller
{
    private QuestionsRepository $questionRepository;
    private ReponseRepositoryInterface $responseRepository;

    public function __construct(QuestionsRepositoryInterface $questionRepository, ReponseRepositoryInterface $responseRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->responseRepository = $responseRepository;
    }

    public function questions()
    {
        $questions = $this->questionRepository->all();
        return $this->responseRepository->sendResponse($questions);
    }

    public function question($id)
    {
        $question = $this->questionRepository->show($id);
        if ($question) {
            return $this->responseRepository->sendResponse($question);
        } else {
            return $this->responseRepository->sendError([], 'No question found', 404);
        }
    }

    public function createQuestion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->responseRepository->sendError($validator->errors(), 'Validation Error.', 400);
        }

        $data['title'] = $request->title;
        $data['body'] = $request->body;
        $question = $this->questionRepository->create($data);
        if ($question) {
            return $this->responseRepository->sendResponse([], 'Question created successfully');
        } else {
            return $this->responseRepository->sendError([], 'Question not created', 500);
        }
    }

    public function answers($id)
    {
        $answers = $this->questionRepository->answers($id);
        return $this->responseRepository->sendResponse($answers);
    }

    public function createAnswer(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->responseRepository->sendError($validator->errors(), 'Validation Error.', 400);
        }
        $data['id'] = $id;
        $data['body'] = $request->body;
        $answer = $this->questionRepository->createAnswer($data);
        if ($answer) {
            return $this->responseRepository->sendResponse([], 'Answer created successfully');
        } else {
            return $this->responseRepository->sendError([], 'Answer not created', 500);
        }
    }



}
