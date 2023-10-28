<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function get(){
        return view('admin.session.get');
    }

    public function put(){
        return view('admin.session.put');
    }

    public function flash(){
        return view('admin.session.flash');
    }

    public function delete(){
        return view('admin.session.delete');
    }

    public function ajax(){
        return view('admin.session.ajax');
    }

    public function putSession(Request $request){
        $session1 = $request['session1'];
        $session2 = $request['session2'];
        $session3 = $request['session3'];
        session()->put('s1',$session1);
        session()->put('s2',$session2);
        session()->put('s3',$session3);
        return view('admin.session.get');
    }

    public function flashSession(Request $request){
        $name = $request['name'];
        $age = $request['age'];
        $address = $request['address'];

        session()->put('name',$name);
        session()->put('age',$age);
        session()->put('address',$address);
        session()->flash('flash-message', 'You saved the record successfully.');
        return redirect('/admin/session/flash');
    }

    public function deleteSession($sessionName){
        if($sessionName == "delete-all-session"){
            session()->flush();
        }
        else{
            session()->forget($sessionName);
        }

        return redirect('/admin/session/delete');
    }

    public function getSession($sessionName){
        return response()->json(session()->get($sessionName));
    }

    
}
