<?php

namespace App\Http\Controllers;

use App\Models\CustomerSale;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CustomerSale::select(
            'customer_sales.id',
            'customer_sales.customer_code',
            'brands.brand_name',
            'categories.category_name',
            'items.item_image',
            'items.item_name',
            'items.purchase_price',
            'customers.customer_name',
            'customers.contact_name',
            'customers.address',
            'customers.city',
            'customers.postal_code',
            'customers.country',
            'customer_sales.created_at',
            'customer_sales.updated_at',
            'cb_users.email as created_by',
            'ub_users.email as updated_by'
        )
            ->leftJoin('brands', 'customer_sales.brand_id', 'brands.id')
            ->leftJoin('categories', 'customer_sales.category_id', 'categories.id')
            ->leftJoin('sales', 'customer_sales.sale_id', 'sales.id')
            ->leftJoin('items', 'customer_sales.item_id', 'items.id')
            ->leftJoin('customers', 'customer_sales.customer_id', 'customers.id')
            ->leftJoin('users as cb_users', 'customer_sales.created_by', 'cb_users.id')
            ->leftJoin('users as ub_users', 'customer_sales.updated_by', 'ub_users.id')
            ->get();
        return view('admin.project.sales.index')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::get();
        $category = Category::get();
        $customer = Customer::get();
        return view('admin.project.sales.create')
            ->with('brands', $brand)
            ->with('categories', $category)
            ->with('customers', $customer);
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
                
                'customer_code'  => 'required',

                'item_image'  => 'required|image|mimes:jpg,png,jpeg,webp',
                'item_name'  => 'required',
                'purchase_price'  => 'required|integer',
                'customer_name'  => 'required',
                'contact_name' => 'required',
                'address' => 'required',
                'city' => 'required',
                'postal_code' => 'required |integer',
                'country' => 'required',

            ]
        );

        if($validator->fails()){
            return redirect('admin/customer_sales/create')
                    ->withErrors($validator)
                    ->withInput();
        }
        $image_path = $request->file('item_image')->store('customer_sales','public');

        $inputs = [];
        $inputs['brand_id'] = $request->brand_id;

        $inputs['customer_code'] = $request->customer_code;

        $inputs['item_image'] = $image_path;
        $inputs['item_name'] = $request->item_name;
        $inputs['purchase_price'] = $request->purchase_price;
        $inputs['customer_name'] = $request->customer_name;
        $inputs['contact_name'] = $request->contact_name;
        $inputs['address'] = $request->address;
        $inputs['city'] = $request->city;
        $inputs['postal_code'] = $request->postal_code;
        $inputs['country'] = $request->country;

        CustomerSale::insert($inputs);

        session()->flash('message', 'You saved the Record Successfully');

        return redirect('admin/customer_sales');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerSale  $customerSale
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerSale $customerSale)
    {
        $data = CustomerSale::select(
            'customer_sales.id',
            'customer_sales.customer_code',
            'brands.brand_name',
            'categories.category_name',
            'items.item_image',
            'items.item_name',
            'items.purchase_price',
            'customers.customer_name',
            'customers.contact_name',
            'customers.address',
            'customers.city',
            'customers.postal_code',
            'customers.country',
            'customer_sales.created_at',
            'customer_sales.updated_at',
            'cb_users.email as created_by',
            'ub_users.email as updated_by'
        )
            ->leftJoin('brands', 'customer_sales.brand_id', 'brands.id')
            ->leftJoin('categories', 'customer_sales.category_id', 'categories.id')
            ->leftJoin('sales', 'customer_sales.sale_id', 'sales.id')
            ->leftJoin('items', 'customer_sales.item_id', 'items.id')
            ->leftJoin('customers', 'customer_sales.customer_id', 'customers.id')
            ->leftJoin('users as cb_users', 'customer_sales.created_by', 'cb_users.id')
            ->leftJoin('users as ub_users', 'customer_sales.updated_by', 'ub_users.id')
            ->where('customer_sales.id', $customerSale->id)
            ->first();
        return view('admin.project.sales.show')
            ->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerSale  $customerSale
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerSale $customerSale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerSale  $customerSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerSale $customerSale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerSale  $customerSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerSale $customerSale)
    {
        Storage::delete('public/' . $customerSale->item_image);
        CustomerSale::where('id', $customerSale->id)->delete();
    }
}
