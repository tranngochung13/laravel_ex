<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\typeProduct;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Session;
class PageController extends Controller
{
   //slide
   public function getSlide(){
         $slide = Slide::all();
         $type_products = typeProduct::all();
         $product = Product::where('id_type',1)->get();
         return view('demo', compact("type_products", 'slide','product'));
      }

   	public function getIndex(){
         $type_products = typeProduct::all();
         $slide = Slide::all();
         $product = Product::where('id_type',1)->get();
   		return view('page.trangchu',compact("type_products", 'slide','product'));
   	}

      public function getLoaiSp($type) {
         $type_products = typeProduct::all();
         $slide = Slide::all();
         $sp_theoloai = Product::where('id_type',$type)->get();
         $sp_khac = Product::where('id_type','<>',$type)->limit(8)->get();
         $loai_sp = typeProduct::where('id',$type)->first();
         return view('page.loai_sanpham',compact('slide','sp_theoloai','type_products','sp_khac','loai_sp'));
      }

      public function getChitietSp(Request $request) {
         $type_products = typeProduct::all();
         $slide = Slide::all();
         $sp_theoloai = Product::where('id_type',$request)->get();
         $sp_khac = Product::where('id_type','<>',$request)->limit(8)->get();
         $loai_sp = typeProduct::where('id',$request)->first();
         $sanpham = Product::where('id',$request->id)->first();
         $sptuongung = Product::where('id_type',$sanpham->id_type)->paginate(3);
         return view('page.chitiet_sanpham',compact('slide','sp_theoloai','type_products','sp_khac','loai_sp','sanpham','sptuongung'));
      }

      public function getDeleteItemCart($id){
         $oldCart = Session::has('cart')?Session::get('cart'):null;
         $cart = new Cart($oldCart);
         $cart -> removeItem($id);
         if(count($cart->items)>0){
            session::put('cart',$cart);
         }else{
            Session::forget('cart');
         }
         return redirect()->back();
      }

      public function getAddtoCart(Request $request, $id){
         $product = Product::find($id);
         $oldCart = Session('cart')?Session::get('cart'):null;
         $cart = new Cart($oldCart);
         $cart -> add($product, $id);
         $request -> session()->put('cart',$cart);
         return redirect()->back();
      }

      public function getCheckout(){
         $type_products = typeProduct::all();
         $slide = Slide::all();
         $product = Product::where('id_type',1)->get();
         return view('page.checkout',compact("type_products", 'slide','product'));
      }

      public function postCheckout(Request $req){
         $cart = Session::get('cart');
         dd($cart);
         $customer = new Customer;
         $customer->name = $req->name;
         $customer->gender = $req->gender;
         $customer->email = $req->email;
         $customer->address = $req->address;
         $customer->phone_number = $req->phone;
         $customer->note = $req->notes;
         $customer->save();

         $bill = new Bill;
         $bill->id_customer = $customer->id;
         $bill->date_order = date('Y-m-d');
         $bill->total = $cart->totalPrice;
         $bill->payment = $req->payment_method;
         $bill->note = $req->notes;
         $bill->save();

         foreach($cart->items as $key=>$value){
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;//$value['item']['id'];
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
         }
         Session::forget('cart');
         return redirect()->back()->with('thongbao','Đặt hàng thành công');
      }

   	public function getTypeProduct(){
   		return view('page.loai_sanpham');
   	}
   	public function getChitiet(){
   		return view('page.chitiet_sanpham');
   	}
   	public function getLienhe(){
   		return view('page.lienhe');
   	}
   	public function getAbout(){
   		return view('page.about');
   	}
}
