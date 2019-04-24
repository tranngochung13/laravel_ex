<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $clientname = $request->file('image')->getClientOriginalName();   
         $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();

         $request->file('image')->move(
            base_path() . '/public/images/catalog/', $imageName
         );

         $product = new Product(array(
              'name' => $request->get('name'),
              'sku'  => $request->get('sku'),
              'filename'=> $clientname
            ));

          $product->save();

            return \Redirect::route('product.edit', 
                array($product->id))->with('message', 'Product added!');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upload(Request $request) {
        $this->validate($request,[
            'file'=>'mimes:jpeg,bmp,png|Required'
        ]);

        $clientname = $request->file('file')->getClientOriginalName();
        $imageName = time().'.'.$request->file('file')->getClientOriginalExtension();
        $mimeType = $request->file('file')->getClientMimeType();
        $clientSize = $request->file('file')->getClientSize();

        $info = '<li>Original Name: '.$clientname.'</li>';
        $info .= '<li>New Name: '.$imageName.'</li>';
        $info .= '<li>Mime Type: '.$mimeType.'</li>';
        $info .= '<li>Size: '.$clientSize.' bytes</li>';

        $request->file('file')->move(
            base_path() . '/public/images/', $imageName
        );

        \Session::flash('message', 'Successfully uploaded!<br/>'.$info);
        return redirect('product');
    }
}
