<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::all();
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
            "name" => ['required', 'regex:/(\w)+_item$/'],
            "value" => "numeric|between:10,100",
            "quality" => "numeric|between:-10,100"
        ],
        [
            'name.regex' => 'Item name must end with _item'
        ]);
        return Item::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Item::find($id)){
            return Item::find($id);
        }
        else {
            $meesage =  [
                "status" => false,
                "message" => "Item not found!"
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
        if(Item::find($id)){
            $request->validate([
                "name" => ['regex:/(\w)+_item$/'],
                "value" => "numeric|between:10,100",
                "quality" => "numeric|between:-10,50"
            ],
            [
                'name.regex' => 'Item name must end with _item'
            ]);
            $item = Item::find($id);
            $item->update($request->all());
            return $item;
        }
        else {
            $meesage =  [
                "status" => false,
                "message" => "Item not found!"
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
        if(Item::find($id)){
            Item::destroy($id);
            $meesage =  [
                "status" => true,
                "message" => "Item deleted!",
                "id" => $id
            ];
            return response()->json($meesage,404);
        }
        else {
            $meesage =  [
                "status" => false,
                "message" => "Item not found!"
            ];
            return response()->json($meesage,404);
        }
    }
}
