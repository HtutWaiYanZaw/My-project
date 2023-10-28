<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutingController extends Controller
{
    public function viewOnly(){
        return view('admin.routing.view-only');
    }

    public function passDataToView(){
        $buttonArray = [
            [
                "type" => "btn-primary",
                "text" => "primary button"
            ],
            [
                "type" => "btn-secondary",
                "text" => "secondary button"
            ],
            [
                "type" => "btn-danger",
                "text" => "danger button"
            ],
            [
                "type" => "btn-success",
                "text" => "sucess button"
            ],
            [
                "type" => "btn-info",
                "text" => "info button"
            ]
        ];

        $linkArray = [
            (Object)[
                "href" => "https://www.google.com",
                "text" => "Google",
            ],
            (Object)[
                "href" => "https://www.youtube.com",
                "text" => "Youtube",
            ],
            (Object)[
                "href" => "https://www.microsoft.com",
                "text" => "Microsoft",
            ]
        ];
        
        return view('admin.routing.pass-data-to-view')
                ->with('buttons',$buttonArray)
                ->with('links',$linkArray);

    }

    public function routePara($bgColor,$color){        
        return view('admin.routing.route-para')
        ->with('bgColor',$bgColor)
        ->with('color',$color);
    }

    public function dynamicRoutePara(){
        return view('admin.routing.dynamic-route-para');
    }

    public function submitDynamicRoutePara(Request $request){
        $bgColor = $request['bgColor'];        
        $color = $request['color'];        
        return redirect('/admin/routing/route-para/' . $bgColor . "/" . $color);
    }

    public function namedRoute(){
        return view('admin.routing.named-route');
    }

    public function testMiddleware(){
        return view('admin.routing.middleware');
    }

    public function checkMiddleware(Request $request){
        $age = $request['age'];
        dd($age);
    }

    public function regularExpression(){
        return view('admin.routing.regular-expression');
    }

    public function regularExpressionWithRoutePara($id,$name){
        dd($id,$name);
    }
}
