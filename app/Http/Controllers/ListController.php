<?php

namespace App\Http\Controllers;

use App\Models\update;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = update::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new update;
        $item->text =$request->text;
        $item->save();
        return response()->json([
            'message'=>'Created successfully',
            'data' => $item
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(update $update)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, update $update)
    {
        $item = update::where('id', $update->id)->first();
        $item->text = $request->text;
        $item-> save();
        if($item){
            return response()->json([
                'message' => 'Updated successfully',
            ],200);
    }else{
        return response()->json([
            'message'=> 'Not found',
        ],404);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy(update $update)
    {
        $item = update::where('id',$update->id)->delete();
        if($item){
            return response()->json([
                'message' =>'Deleted successfully',
            ],200);
        }else{
            return response()->json([
                'message'=>'Not found',
            ],404);
        }
    }
}