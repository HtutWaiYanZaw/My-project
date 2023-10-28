<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Category::all();

        return view('admin.pos.categories.index')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pos.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "category_name" => "required|unique:categories"
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/categories/create')
                ->withErrors($validator)
                ->withInput();
        }

        $input = [];
        $input['category_name'] = $request->category_name;
        $input['description'] = $request->description;
        $input['created_by'] = auth()->user()->email;
        $input['created_at']= Carbon::now();

        Category::insert($input);

        session()->flush('message', 'You saved the record successfully');

        return redirect ('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $data = $category->where('id', $category->id)->first();

        return view('admin.pos.categories.show')
            ->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = Category::where('id', $category->id)->first();

        return view('admin.pos.categories.edit')
            ->with('category', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'category_name' => "required|unique:categories,category_name," . $category->id
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/categories/' . $category->id . "/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $inputs = [];
        $inputs['category_name'] = $request->category_name;
        $inputs['description'] = $request->description;
        $inputs['updated_by'] = auth()->user()->email;
        $inputs['updated_at'] = Carbon::now();

        Category::where('id', $category->id)->update($inputs);

        session()->flush('message', 'You Update The Record Successfully');

        return  redirect('admin/categories');

        dd($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
