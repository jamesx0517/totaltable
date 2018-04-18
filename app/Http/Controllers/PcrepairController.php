<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pcrepair;
use App\User;
use App\project;
use App\nature;
use Validator;
use Redirect;

class PcrepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $repair=Pcrepair::orderBy('id', 'desc')->simplePaginate(10);
          foreach ($repair as $item )
          {
          $item ->uid=$item->uid()->first()->name;
          $item ->project=$item->project()->first()->name;
          $item ->pid=$item->department()->first()->name;
          $item ->it=$item->it()->first()->name;
          $item ->status=$item->status()->first()->name;
          }    //item 的status要等於 item  呼叫  status() 帶入name
        return  $repair;
    }

    public function Clients($id)
    {
          $uid=User::findOrFail($id)->id;

          $repair=Pcrepair::orderBy('id', 'desc')->where('uid',$uid)->simplePaginate(10);
              /*                排序                     單位=2           分頁*/
          foreach ($repair as $item )
          {
          $item ->uid=$item->uid()->first()->name;
          $item ->project=$item->project()->first()->name;
          $item ->pid=$item->department()->first()->name;
          $item ->it=$item->it()->first()->name;
          $item ->status=$item->status()->first()->name;
          }    //item 的status要等於 item  呼叫  status() 帶入name
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
    {

      $validator=Validator::make($request->all() , [

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
         Pcrepair::create($request->all());
        return Redirect::route('clients');
  }             //執行 名為form的route

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
         $item ->nature =$item->nature()->first()->name;

         return $item;

    }

    public function it($id)
    {
        $item=Pcrepair::findOrFail($id);


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
      $data = Pcrepair::find($id);
      return view('case', compact('data'));
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
      $data = $request->all();
     Pcrepair::find($id)->update($data);
     return redirect('/pcrepairs/');
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
