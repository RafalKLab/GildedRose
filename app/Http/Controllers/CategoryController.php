<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'Required|min:5'
        ]);
        return Category::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Category::find($id)){
            return Category::find($id);
        }
        else {
            $meesage =  [
                "status" => false,
                "message" => "Category not fund!"
            ];
            return response()->json($meesage,404);
        }
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
        if(Category::find($id)){
            $category = Category::find($id);
            $category->update($request->all());
            return $category;
        }
        else {
            $meesage =  [
                "status" => false,
                "message" => "Category not fund!"
            ];
            return response()->json($meesage,404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Category::destroy($id);
    }


    /**
     * Search items by certain category
     *
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        //return Category::where('name', 'like', '%' .$name. '%')->get();
        $category = Category::where('name', 'like', '%' .$name. '%')->first();
        return $category->items;
    }
}
