<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pcrepair;
use Validator;
class PcrepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $repair=Pcrepair::simplePaginate(10);
        foreach ($repair as $item ) {
          $item ->uid=$item->uid()->first()->name;
          $item ->project=$item->project()->first()->name;
          $item ->pid=$item->department()->first()->name;
          $item ->it=$item->it()->first()->name;
          $item ->status=$item->status()->first()->name;
      }
        return  $repair;
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
    {     $validator=Validator::make($request->all() , [
                    'date'=>'required',
                    'uid'=>'required',
                    'pid'=>'required',
                    'category'=>'required',
                    'project'=>'required',
                    'nature'=>'required',
                    'note'=>'required',
                    'status'=>'required',
                    'it'=>'required',
                    'title'=>'required',
                  ]);


            if( $validator->fails()){
              return ['erros'=>$validator->errors()];
            }
          return Pcrepair::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Pcrepair::findOrFail($id);

         $item ->uid=$item->uid()->first()->name;
         $item ->project=$item->project()->first()->name;
         $item ->pid=$item->department()->first()->name;
         $item ->it=$item->it()->first()->name;
         $item ->status=$item->status()->first()->name;

       return  $item;
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
}
