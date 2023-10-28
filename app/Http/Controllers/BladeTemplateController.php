<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BladeTemplateController extends Controller
{
    public function __construct(){
        $this->middleware('slm');
    }

    public function jsonString(){
        $listItems = [
            [
                "text" => "W3schools",
                "href" => "https://w3schools.com",
            ],
            [
                "text" => "Google",
                "href" => "https://google.com"
            ]
        ];
                
        return view('admin.blade-template.json-string')
        ->with('listItems',$listItems);
    }

    public function localization(){
        return view('admin.blade-template.localization');
    }

    public function changeLocalization(Request $request){
        $language = $request['language'];
        App::setLocale($language);
        session()->put('language',$language);        
        return redirect('/admin/blade-template/localization');
    }

    public function component(){
        $alerts = [
            [
                "type" => "warning",
                "header" => "Alert Warning",
                "message" => "This is warning message"
            ],
            [
                "type" => "info",
                "header" => "Alert Info",
                "message" => "This is info message"
            ],
            [
                "type" => "primary",
                "header" => "Alert Primary",
                "message" => "This is primary message"
            ]
        ];
        return view('admin.blade-template.component')
                    ->with('alerts',$alerts);
    }
}
