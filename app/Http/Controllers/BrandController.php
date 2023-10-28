<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::get();

        return view('admin.pos.brands.index')
            ->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pos.brands.create');
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
                'brand_name' => 'required|unique:brands'
            ]
        );

        if($validator->fails()){
            return redirect('/admin/brands/create')
                ->withErrors($validator)
                ->withInput();
        }

        $inputs = [];
        $inputs['brand_name'] = $request['brand_name'];
        $inputs['description'] = $request['description'];
        $inputs['created_by'] = auth()->user()->email;
        $inputs['created_at'] = Carbon::now();

        Brand::insert($inputs);

        session()->flash('message',"You saved the record successfully.");

        return redirect('/admin/brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        $data = Brand::where('id',$brand->id)->first();

        return view('admin.pos.brands.show')
            ->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $brand = Brand::where('id',$brand->id)->first();
        return view('admin.pos.brands.edit')
            ->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'brand_name' => 'required|unique:brands,brand_name,' . $brand->id
            ]
        );

        if($validator->fails()){
            return redirect('/admin/brands/' . $brand->id . "/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $inputs = [];
        $inputs['brand_name'] = $request['brand_name'];
        $inputs['description'] = $request['description'];
        $inputs['updated_by'] = auth()->user()->email;
        $inputs['updated_at'] = Carbon::now();

        Brand::where('id',$brand->id)->update($inputs);

        session()->flash('message',"You updated the record successfully.");

        return redirect('/admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        Brand::where('id',$brand->id)->delete();
    }
}
