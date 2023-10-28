<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CSRFController extends Controller
{
    public function lecture1(){
        return view('admin.csrf.lecture1');
    }

    public function lecture2(){
        return view('admin.csrf.lecture2');
    }

    public function lecture3(){
        return view('admin.csrf.lecture3');
    }

    public function create(Request $request){
        $name = $request['name'];
        $age = $request['age'];
        dd($name,$age);
    }

    public function getListItemData(){
        $data = [
            "item1", "item2", "item3","item4","item5"
        ];

        return response()->json($data);
    }
}
