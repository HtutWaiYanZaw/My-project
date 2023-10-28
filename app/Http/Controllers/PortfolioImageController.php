<?php

namespace App\Http\Controllers;

use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PortfolioImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PortfolioImage::get();

        return view('admin.portfolio-images.index')
            ->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio-images.create');
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
                'image' => 'required|image|mimes:jpg,png,jpeg',
                'image_label' => 'required',
                'image_description' => 'required'
            ]
        );

        if($validator->fails()){
            return redirect('/admin/portfolio-images/create')
                ->withErrors($validator)
                ->withInput();
        }

        $image_path = $request->file('image')->store('portfolio-images','public');

        $inputs = [];
        $inputs['image'] = $image_path;
        $inputs['image_label'] = $request['image_label'];
        $inputs['image_description'] = $request['image_description'];
        $inputs['created_at'] = Carbon::now();
        
        PortfolioImage::insert($inputs);
        session()->flash('message',"You saved the record successfully.");
        return redirect('/admin/portfolio-images');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return \Illuminate\Http\Response
     */
    public function show(PortfolioImage $portfolioImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioImage $portfolioImage)
    {
        return view('admin.portfolio-images.edit')
            ->with('portfolioImage',$portfolioImage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioImage $portfolioImage)
    {
        $id= $request['id'];
        $hasFile = $request->hasFile('image');

        if($hasFile){
            $validator = Validator::make(
                $request->all(),
                [
                    'image' => 'required|image|mimes:jpg,png,jpeg',
                    'image_label' => 'required',
                    'image_description' => 'required'
                ]
            );
        }
        else{
            $validator = Validator::make(
                $request->all(),
                [              
                    'image_label' => 'required',
                    'image_description' => 'required'
                ]
            );
        }
      
        if($validator->fails()){
            return redirect('/admin/portfolio-images/' . $portfolioImage->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        if($hasFile){
            Storage::delete('public/' . $portfolioImage->image);
            $image_path = $request->file('image')->store('portfolio-images','public');    
        }

        

        $inputs = [];
        $inputs['image'] = $hasFile? $image_path : $portfolioImage->image;
        $inputs['image_label'] = $request['image_label'];
        $inputs['image_description'] = $request['image_description'];
        $inputs['updated_at'] = Carbon::now();
        
        PortfolioImage::where('id',$portfolioImage->id)->update($inputs);
        session()->flash('message',"You updated the record successfully.");
        return redirect('/admin/portfolio-images');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PortfolioImage  $portfolioImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioImage $portfolioImage)
    {                
        Storage::delete('public/' . $portfolioImage->image);
        PortfolioImage::where('id',$portfolioImage->id)->delete();
        return response()->json('delete successfully');
    }
}
