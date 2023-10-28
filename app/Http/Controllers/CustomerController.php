<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::all();

        return view('admin.customers.index')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $customer = Customer::get();
        return view('admin.customers.create')
            ->with('customer', $customer);
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
                'customer_name' => 'required|',
                'contact_name' => 'required',
                'address' => 'required',
                'city' => 'required',
                'postal_code' => 'required',
                'country' => 'required'
            ]


        );



        if ($validator->fails()) {
            return redirect('admin/customers/create')
                    ->withErrors($validator)
                    ->withInput();

        }



        $inputs = [];
        $inputs['customer_name'] = $request->customer_name;
        $inputs['contact_name'] = $request->contact_name;
        $inputs['address'] = $request->address;
        $inputs['city'] = $request->city;
        $inputs['postal_code'] = $request->postal_code;
        $inputs['country'] = $request->country;
        $inputs['created_at'] = Carbon::now();
        $inputs['created_by'] = auth()->user()->email;

        Customer::insert($inputs);

        session()->flash('message','You Create The Record Successfully');

        return redirect('admin/customers');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer = Customer::where('id',$customer->id)->first();

        return view('admin.customers.show')
            ->with('customer',$customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customer = Customer::where('id',$customer->id)->first();

        return view('admin.customers.edit')
            ->with('customer',$customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'customer_name' => 'required|',
                'contact_name' => 'required',
                'address' => 'required',
                'city' => 'required',
                'postal_code' => 'required',
                'country' => 'required'
            ]
        );

        if($validator->fails()){
            return redirect ('admin/customers/' . $customer->id . '/edit')
                    ->withErrors($validator)
                    ->withInput();
        }

        $inputs = [];
        $inputs['customer_name'] = $request->customer_name;
        $inputs['contact_name'] = $request->contact_name;
        $inputs['address'] = $request->address;
        $inputs['city'] = $request->city;
        $inputs['postal_code'] = $request->postal_code;
        $inputs['country'] = $request->country;
        $inputs['updated_at'] = Carbon::now();
        $inputs['updated_by'] = auth()->user()->email;

        Customer::where('id',$customer->id)->update($inputs);

        session()->flash('message','You Update The Record Successfully');

        return redirect('admin/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
