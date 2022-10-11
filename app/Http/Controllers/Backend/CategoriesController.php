<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File as FacadesFile;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        return view('backend.categories.index', compact('categories'));
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
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories|max:255',
            'category_image' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Kategori kaydedilemedi.');
        } else {
            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/categories');
                $image->move($destinationPath, $name);
                $category = Categories::insert([
                    'category_name' => $request->category_name,
                    'status' => $request->status,
                    'category_image' => $name,
                ]);
                if ($category) {
                    return redirect()->back()->with('success', 'Kategori başarıyla kaydedildi.');
                } else {
                    return redirect()->back()->with('error', 'Kategori kaydedilemedi.');
                }
            } else {
                return redirect()->back()->with('error', 'Kategori resmi zorunlu.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Categories $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::findOrfail($id);
        if ($category) {
            $category["url"] = route('admin.categories.update', $category->id);
            return response()->json($category);
        } else {
            return redirect()->back()->with('error', 'Kategori bulunamadı.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|max:255',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Kategori kaydedilemedi.');
        } else {
            $data = array(
                'category_name' => $request->category_name,
                'status' => $request->status,
            );
            if ($request->hasFile('category_image')) {
                $image = $request->file('category_image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/categories');
                $image->move($destinationPath, $name);
                $data["category_image"] = $name;
                $image_path = public_path('/categories/' . $request->temp_image);
                if (FacadesFile::exists($image_path)) {
                    FacadesFile::delete($image_path);
                }
            }
            $category = Categories::where('id', $id)->update($data);
            if ($category) {
                return redirect()->back()->with('success', 'Kategori başarıyla güncellendi.');
            } else {
                return redirect()->back()->with('error', 'Kategori güncellenemedi.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::findOrfail($id);
        if ($category) {
            $image_path = public_path('/categories/' . $category->category_image);
            if (FacadesFile::exists($image_path)) {
                FacadesFile::delete($image_path);
            }
            $category->delete();
            return redirect()->back()->with('success', 'Kategori başarıyla silindi.');
        } else {
            return redirect()->back()->with('error', 'Kategori silinemedi.');
        }
    }
}
