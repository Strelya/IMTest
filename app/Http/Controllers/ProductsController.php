<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $product = Products::find($name);

        return view('layouts.product', compact('product'));
    }

    public function pages(Request $request)
    {
        switch ($request['sort']) {
            case 'sort_name':
                $products = Products::orderBy('name', 'asc')->paginate(12);
                break;
            case 'sort_asc':
                $products = Products::orderBy('price', 'asc')->paginate(12);
                break;
            case 'sort_desc':
                $products = Products::orderBy('price', 'desc')->paginate(12);
                break;
            default: $products = Products::orderBy('updated_at', 'desc')->paginate(12);
        }

        return view('layouts.pages', compact('products'));
    }

    public function admin_products()
    {
        $products = Products::paginate(12);
        return view('layouts.admin_products', compact('products'));
    }

    public function admin_product(Products $product)
    {
        return view('layouts.admin_product', compact ('product'));
    }

    public function edit(Products $product)
    {
        return view('layouts.edit_product', compact ('product'));//
    }

    public function update(Products $product)
    {
        $this->validate(request(), [
            'name' => 'required|min:2',
            'slug' => 'required',
            'descr' => 'required',
            'id_category' => 'required',
            'price' => 'required',
        ]);

        Products::where('id', request('id_prod'))//велосипед из костылей
        ->update(request(['name', 'slug', 'id_category', 'descr', 'price']));

        return redirect('/admin_products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:2',
            'slug' => 'required',
            'descr' => 'required',
            'id_category' => 'required',
            'price' => 'required',
        ]);
        
        Products::create($request->all());

        return redirect('/admin_products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, Request $request )
    {
        $product = Products::findOrFail( $id );

        if ( $request->ajax() ) {
            $product->delete();
        }
    }

    public function search( Request $request )
    {
        $q = $request->get('query');

        $search_result = Products::whereRaw(
            "MATCH(name) AGAINST(? IN BOOLEAN MODE)",
            array($q)
        )->paginate(12);

        return view('layouts.search', compact('search_result'));

    }
}
