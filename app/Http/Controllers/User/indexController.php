<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class indexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

      //  dd(\Auth::user());
      //return view('user.index');
    }

    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsPostUpdateRequest $request, $id)
    {
        //dd(__METHOD__, $request->all(), $id);
      
    }


}
