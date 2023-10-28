<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Item::select('items.id','brands.brand_name','categories.category_name','items.item_image',
        'items.item_code', 'items.item_name','items.in_hand_qty','items.purchase_price','items.warranty',
        'cb_users.email as created_by', 'ub_users.email as updated_by','items.created_at','items.updated_at')
            ->leftJoin('brands','items.brand_id','brands.id')
            ->leftJoin('categories','items.category_id','categories.id')
            ->leftJoin('users as cb_users','items.created_by','cb_users.id')
            ->leftJoin('users as ub_users','items.updated_by','ub_users.id')
            ->get();
        return view('admin.pos.items.index')
                ->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::get();
        $categories = Category::get();
        return view ('admin.pos.items.create')
            ->with('brands',$brands)
            ->with('categories',$categories);
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
                'brand_id' => 'required',
                'category_id' => 'required',
                'item_image' => 'required|image|mimes:jpg,png,jpeg',
                'item_code' => 'required|unique:items',
                'item_name' => 'required',
                'qty' => 'required|integer',
                'price' => 'required|integer',
                'warranty' => 'required'
            ]
        );

        if($validator->fails()){
            return redirect('/admin/items/create')
                ->withErrors($validator)
                ->withInput();
        }

        $image_path = $request->file('item_image')->store('item-images','public');

        $inputs = [];
        $inputs['brand_id'] = $request['brand_id'];
        $inputs['category_id'] = $request['category_id'];
        $inputs['item_image'] = $image_path;
        $inputs['item_code'] = $request['item_code'];
        $inputs['item_name'] = $request['item_name'];
        $inputs['in_hand_qty'] = $request['qty'];
        $inputs['purchase_price'] = $request['price'];
        $inputs['warranty'] = $request['warranty'];
        $inputs['created_by'] = auth()->user()->id;
        $inputs['created_at'] = Carbon::now();

        Item::insert($inputs);

        session()->flash('message',"You saved the record successfully.");

        return redirect('/admin/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $brands = Brand::get();
        $categories = Category::get();
        return view ('admin.pos.items.edit')
            ->with('brands',$brands)
            ->with('categories',$categories)
            ->with('item',$item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'brand_id' => 'required',
                'category_id' => 'required',
                'item_code' => 'required|unique:items,item_code,' . $item->id,
                'item_name' => 'required',
                'qty' => 'required|integer',
                'price' => 'required|integer',
                'warranty' => 'required'
            ]
        );

        if($validator->fails()){
            return redirect('/admin/items/create')
                ->withErrors($validator)
                ->withInput();
        }

        $inputs = [];
        $inputs['brand_id'] = $request['brand_id'];
        $inputs['category_id'] = $request['category_id'];
        $inputs['item_code'] = $request['item_code'];
        $inputs['item_name'] = $request['item_name'];
        $inputs['in_hand_qty'] = $request['qty'];
        $inputs['purchase_price'] = $request['price'];
        $inputs['warranty'] = $request['warranty'];
        $inputs['updated_by'] = auth()->user()->id;
        $inputs['updated_at'] = Carbon::now();

        Item::where('id',$item->id)->update($inputs);

        session()->flash('message',"You updated the record successfully.");

        return redirect('/admin/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Storage::delete('public/' . $item->item_image);
        Item::where('id',$item->id)->delete();
    }
}
