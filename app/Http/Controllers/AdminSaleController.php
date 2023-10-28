<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleItem;
class AdminSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sale::select('sales.id','sales.invoice_date','sales.total_amount'
        ,'users.email as created_by' , 'sales.created_at'
        )
        ->leftJoin('users', 'sales.created_by' , 'users.id')
        ->get();

        return view ('admin.pos.sales.index')
        ->with('data',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $data = Sale::select('sales.id','sales.invoice_date','sales.total_amount'
        ,'users.email as created_by' , 'sales.created_at'
        )
        ->leftJoin('users', 'sales.created_by' , 'users.id')
        ->where('sales.id',$sale->id)
        ->first();

        $data['items']= SaleItem::select('brands.brand_name','categories.category_name','items.item_code'
        , 'items.item_name','items.item_image','sale_items.item_id', 'sale_items.saled_qty','sale_items.saled_price')
        ->leftJoin('items' , 'sale_items.item_id' , 'items.id')
        ->leftJoin('brands',  'items.brand_id'  , 'brands.id')
        ->leftJoin('categories',   'items.category_id'    , 'categories.id')
        ->where('sale_items.sale_id' , $sale->id)
        ->get();



        return view ('admin.pos.sales.show')
                ->with('data',$data);
    }


}
