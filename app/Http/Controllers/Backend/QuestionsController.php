<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\QuestionAnswers;
use App\Models\Questions;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Questions::all();
        return view('backend.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Questions $questions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Questions::findOrfail($id);
        if ($question) {
            $answers = $question->answers;
            return view('backend.questions.answers', compact('question', 'answers'));
        }else{
            return redirect()->back()->with('error', 'Soru bulunamadı');
        }

    }

    public function active($id)
    {
        $question = QuestionAnswers::findOrfail($id);
        if ($question) {
            $question->is_published = 1;
            $question->save();
            return redirect()->back()->with('success', 'Cevap aktif edildi');
        }else{
            return redirect()->back()->with('error', 'Cevap bulunamadı');
        }
    }

    public function answerDestroy($id)
    {
        $answer = QuestionAnswers::findOrfail($id);
        if ($answer) {
            $answer->delete();
            return redirect()->back()->with('success', 'Cevap silindi');
        }else{
            return redirect()->back()->with('error', 'Cevap bulunamadı');
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Questions $questions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Questions::find($id);
        $data = [
            'title' => $question->title,
            'body' => $question->body,
            'is_published' => $question->is_published,
            'url' => route('admin.questions.update', $id),
        ];


        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Questions $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data = [
            'title' => $request->title,
            'body' => $request->body,
            'is_published' => $request->is_published,
        ];
        $question = Questions::where('id', $id)->update($data);
        if ($question) {
            return redirect()->back()->with('success', 'Soru başarıyla güncellendi.');
        } else {
            return redirect()->back()->with('error', 'Soru güncellenemedi.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Questions $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Questions::find($id);
        if ($question) {
            $question->delete();
            return redirect()->back()->with('success', 'Soru başarıyla silindi.');
        } else {
            return redirect()->back()->with('error', 'Soru silinemedi.');
        }
    }
}
