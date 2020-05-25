<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Categories $category, Request $request)
    {
        if ($category) {
            switch ($request['sort']) {
                case 'sort_name':
                    $products = Products::where(['id_category' => $category->id])->orderBy('name', 'asc')->paginate(12);
                    break;
                case 'sort_asc':
                    $products = Products::where(['id_category' => $category->id])->orderBy('price', 'asc')->paginate(12);
                    break;
                case 'sort_desc':
                    $products = Products::where(['id_category' => $category->id])->orderBy('price', 'desc')->paginate(12);
                    break;
                default: $products = Products::where(['id_category' => $category->id])->paginate(12);
            }

            return view('layouts.products', ['products' => $products, 'category' => $category]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.create_category');
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
            'cat_name' => 'required|min:2',
            'slug' => 'required',
            'descr' => 'required',
        ]);

        Categories::create($request->all());

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $category)
    {
        return view('layouts.category', compact ('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $category)
    {
        return view('layouts.edit_category', compact ('category'));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Categories $category)
    {
        $this->validate(request(), [
            'cat_name' => 'required|min:2',
            'slug' => 'required',
            'descr' => 'required',
        ]);

        Categories::where('id', request('id_cat'))//велосипед из костылей
        ->update(request(['cat_name', 'slug', 'descr', 'website']));

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, Request $request )
    {
        $category = Categories::findOrFail( $id );

        if ( $request->ajax() ) {
            $category->delete();
        }
    }
}
