<?php

namespace App\Repository\Eloquent;

use App\Models\Questions;

class QuestionsRepository implements \App\Repository\QuestionsRepositoryInterface
{

    public function all()
    {
        $questions = Questions::published()->orderBy('created_at', 'desc')->paginate(10);
        $data = [];
        foreach ($questions as $question) {
            $data[] = [
                'id' => $question->id,
                'title' => $question->title,
                'answer_count' => $question->answers->where('is_published', 1)->count(),
                'user' => $question->user->name,
                'created_at' => $question->created_at->translatedFormat('d F Y'),
            ];
        }
        return $data;
    }

    public function create(array $data)
    {
        $question = Questions::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => auth()->user()->id,
        ]);
        return $question;
    }

    public function show($id)
    {
        $question = Questions::findOrfail($id);
        if ($question->is_published == 1) {
            $data = [
                'id' => $question->id,
                'title' => $question->title,
                'body' => $question->body,
                'user' => $question->user->name,
                'created_at' => $question->created_at->translatedFormat('d F Y'),
                'answer_count' => $question->answers->where('is_published', 1)->count(),
            ];
            return $data;
        } else {
            return false;
        }
    }

    public function answers($id)
    {
        $question = Questions::findOrfail($id);
        if ($question) {
            $answers = $question->answers()->published()->orderBy('created_at', 'desc')->get();
            $data = [];
            foreach ($answers as $answer) {
                $data[] = [
                    'id' => $answer->id,
                    'body' => $answer->body,
                    'user' => $answer->user->name,
                    'created_at' => $answer->created_at->translatedFormat('d F Y'),
                ];
            }
            return $data;
        } else {
            return false;
        }
    }

    public function createAnswer(array $data)
    {
        $question = Questions::findOrfail($data['id']);
        if ($question) {
            $answer = $question->answers()->create([
                'body' => $data['body'],
                'user_id' => auth()->user()->id,
                'questions_id' => $question->id,
            ]);
            return true;
        } else {
            return false;
        }
    }
}
