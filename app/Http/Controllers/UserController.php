<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')
                ->select('id','name','email','created_at','updated_at')
                ->get();

        return view('admin.project.users.index')
                ->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.users.create');
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
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ]
        );

        if($validator->fails()){
            return redirect('/admin/users/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        $inputs = [];
        $inputs['name'] = $request->name;
        $inputs['email'] = $request->email;
        $inputs['password'] = bcrypt($request->password);
        $inputs['created_at'] = Carbon::now();
        $inputs['updated_at'] = Carbon::now();

        DB::table('users')->insert($inputs);
        session()->flash('message','You saved the record successfully');
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('users')
                ->where('id',$id)
                ->first();


        return view('admin.project.users.show')
                ->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('users')
                ->select('id','name','email')
                ->where('id',$id)
                ->first();


        return view('admin.project.users.update')
            ->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id
            ]
        );

        if($validator->fails()){
            return redirect('/admin/users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $inputs = [];
        $inputs['name'] = $request->name;
        $inputs['email'] = $request->email;
        $inputs['created_at'] = Carbon::now();
        $inputs['updated_at'] = Carbon::now();

        DB::table('users')->where('id',$id)->update($inputs);
        session()->flash('message','You updated the record successfully');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return response()->json('delete successfully');
    }
}
