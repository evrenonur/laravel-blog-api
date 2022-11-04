<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogPosts;
use App\Models\Categories;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = BlogPosts::all();
        return view('backend.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::active()->get();
        return view('backend.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'contents' => 'required',
            'category_id' => 'required',
            'comment_status' => 'required',
            'is_published' => 'required',
            'is_slider' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Yazı kaydedilemedi.');
        } else {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads');
                $image->move($destinationPath, $name);
                $blog = BlogPosts::insert([
                    'title' => $request->title,
                    'content' => $request->contents,
                    'category_id' => $request->category_id,
                    'comment_status' => $request->comment_status,
                    'is_published' => $request->is_published,
                    'is_slider' => $request->is_slider,
                    'image' => $name,
                ]);
                if ($blog) {
                    return redirect()->back()->with('success', 'Yazı başarıyla kaydedildi.');
                } else {
                    return redirect()->back()->with('error', 'Yazı kaydedilemedi.');
                }
            } else {
                return redirect()->back()->with('error', 'Yazı resmi zorunlu.');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPosts  $blogPosts
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPosts $blogPosts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPosts  $blogPosts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPosts::findorfail($id);
        if ($post) {
            $categories = Categories::active()->get();
            return view('backend.blog.edit', compact('post', 'categories'));
        } else {
            return redirect()->back()->with('error', 'Yazı bulunamadı.');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPosts  $blogPosts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'contents' => 'required',
            'category_id' => 'required',
            'comment_status' => 'required',
            'is_published' => 'required',
            'is_slider' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Yazı güncellenemedi.');
        } else {
            $data = array(
                'title' => $request->title,
                'content' => $request->contents,
                'category_id' => $request->category_id,
                'comment_status' => $request->comment_status,
                'is_published' => $request->is_published,
                'is_slider' => $request->is_slider,
            );
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $blog = BlogPosts::where('id', $id)->update($data);
            if ($blog) {
                return redirect()->back()->with('success', 'Yazı başarıyla kaydedildi.');
            } else {
                return redirect()->back()->with('error', 'Yazı kaydedilemedi.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPosts  $blogPosts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPosts::findOrfail($id);
        if ($post) {
            $image_path = public_path('/uploads/' . $post->image);
            if (FacadesFile::exists($image_path)) {
                FacadesFile::delete($image_path);
            }
            $post->delete();
            return redirect()->back()->with('success', 'Yazı başarıyla silindi.');
        } else {
            return redirect()->back()->with('error', 'Yazı silinemedi.');
        }
    }

    public function comments($id){
        $comments = BlogPosts::with('comments')->findorfail($id);
        return view('backend.blog.comments', compact('comments'));
    }

    public function commentDelete($id){
        $comment = Comments::findorfail($id);
        if($comment){
            $comment->delete();
            return redirect()->back()->with('success', 'Yorum başarıyla silindi.');
        }else{
            return redirect()->back()->with('error', 'Yorum silinemedi.');
        }
    }

    public function commentStatus(Request $request){
        $id = $request->id;
        $comment = Comments::findorfail($id);
        if($comment){
            if($comment->status == 1){
                $comment->status = 0;
            }else{
                $comment->status = 1;
            }
            $comment->update();
            return response()->json($comment);
        }else{
            return response()->json($comment);
        }
    }
}
