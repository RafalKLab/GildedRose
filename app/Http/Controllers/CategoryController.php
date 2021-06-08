<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

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
                "message" => "Category not found!"
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
            $request->validate([
                'name' => 'Required|min:5'
            ]);
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
        if(Category::destroy($id)){
             $meesage =  [
                 "status" => true,
                 "message" => "Category has been deleted",
                 "id" => $id
             ];
            return response()->json($meesage,200);
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
     * Search items by certain category
     *
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $category = Category::where('name', $name)->first();
        //Explanation: category must exist and can not be empty
        if($category AND !$category->items->isEmpty()){
            return $category->items;
        }
        else{
            $meesage =  [
                "status" => false,
                "message" => "Category items not fund!"
            ];
            return response()->json($meesage,404);
        }
    }

    /**
     * Delete items by certain category
     *
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    public function deleteByCategory($name){
        $category = Category::where('name', $name)->first();
        if($category){
            foreach ($category->items as $item){
                Item::destroy($item->id);
            }
            $meesage =  [
                "status" => true,
                "message" => "Category items deleted!"
            ];
            return response()->json($meesage,200);
        }
        else{
            $meesage =  [
                "status" => false,
                "message" => "Category items not fund!"
            ];
            return response()->json($meesage,404);
        }
    }
}
