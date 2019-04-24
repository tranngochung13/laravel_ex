<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\typeProduct;
use App\Cart;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($view){
            $loai_sp = typeProduct::all();
            
            $view->with('loai_sp',$loai_sp);
        });
        view()->composer('header',function($view){
            if (Session('cart')) {
                $oldCard = Session::get('cart');
                $cart = new cart($oldCard);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
