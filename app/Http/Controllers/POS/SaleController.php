<?php

namespace App\Http\Controllers\POS;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\SaleItem;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\Item;

class SaleController extends Controller
{
    public function index(){
        $items = Item::
                select('items.id','items.item_name','items.item_code','items.purchase_price','items.item_image')
                ->get();
        return view('pos.index')
            ->with('items',$items);
    }

    public function searchItem($itemCode){
        if($itemCode == "empty"){
            $items = Item::
            select('items.id','items.item_name','items.item_code','items.purchase_price','items.item_image')
            ->get();
        }
        else{
            $items = Item::
            select('items.id','items.item_name','items.item_code','items.purchase_price','items.item_image')
            ->where('items.item_code','like', '%' . $itemCode . '%')
            ->get();
        }

        return response()->json($items,200);
    }

    public function signIn(){
        return view('pos.sign-in');
    }

    public function signUp() {
        return view ('pos.sign-up');
    }

    public function addToCart(Request $request) {
        // session()->forget('cart');
        // $request->itemId
        $itemId = $request['itemId'];

        $cart = session()->has('cart') ? session()->get('cart') : [];

        $existedInCart = $this->checkItemInCart($cart,$itemId);

        if($existedInCart) {
            $this->addQtyToItem($cart,$itemId);
        }

        else {
            $item = Item::select('id','item_name','item_code','purchase_price','in_hand_qty' , 'item_image')
            ->where('id',$itemId)->first();
            $item['qty'] = 1;
            array_push($cart , $item);
        }





        session()->put('cart',$cart);

        return response()->json($cart,200);
    }

    public function Cart() {
        $cartItems = session()->has('cart') ? session()->get('cart') : [];
        return view ('pos.cart')
        ->with('cartItems',$cartItems);
    }

    public function emptyCart() {
        session()->forget('cart');
        return response()->json('success',200);
    }

    public function removeItem(Request $request) {
        $itemId = $request['id'];
        $this->removeItemFromCart($itemId);
        $cart = session()->has('cart') ? session()->get('cart') : [];
        return response()->json($cart,200);
    }

    public function removeItemFromCart($itemId){
        $cart = session()->has('cart') ? session()->get('cart') : [];
        $temp = [];
        foreach($cart as $item) {
            if($item->id != $itemId){
                array_push($temp,$item);
            }
            session()->put('cart', $temp);
        }
    }

    public function checkout(Request $request) {
        $totalPrice = $request->total_price;

        $data = [];
        $data['invoice_date'] = Carbon::now();
        $data['total_amount'] = $totalPrice;
        $data['created_by'] = auth()->user()->id;
        $data['created_at'] = Carbon::now();
        $saleId = Sale::insertGetId($data);

        $items = session()->has('cart') ? session()->get('cart') : null ;
        foreach($items as $item) {
            $data = [];
            $data['sale_id'] = $saleId;
            $data['item_id'] = $item->id;
            $data['saled_qty'] = $item->qty;
            $data['saled_price'] = $item->purchase_price;
            SaleItem::insert($data);
        }
        session()->forget('cart');

        return response()->json($totalPrice,200);
    }

    public function checkItemInCart($cart , $itemId){
        $result = false;
        foreach ($cart as $item){  //8,9,10,11
            if($item['id']  == $itemId) {
                return true;
            }
        }
        return $result;
    }

    public function addQtyToItem($cart , $itemId) {
        foreach ($cart as $item) {
            if($item['id'] == $itemId) {
                $item['qty'] = $item['qty']+1;
            }
        }
    }
}
