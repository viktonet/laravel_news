<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use App\News;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NewsList = $this->AllUserNews(\Auth::user()->id);
        if($NewsList){
          $countNews = count($NewsList);
        }else{
          $countNews = 0;
        }
        //News::where('user_id', \Auth::user()->id)->get();

        return view('user.index', compact('countNews'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $id==\Auth::user()->id;
        $item = User::Find($id);
        return view('user.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UserUpdateRequest $request, $id)
     {
         $id = \Auth::user()->id;
         $item = User::Find($id);

         if(empty($item)){
           return back()
             ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
             ->withInput();
         }

         $data = $request->all();

         //$data = $request->except(['_method', '_token', 'button']);
         $result = $item->fill($data)->save();

         if($result){
           return redirect()
             ->route('user.edit', $id)
             ->with(['success' => "Успешно сохранено"]);
         }else{
           return back()
             ->withErrors(['msg' => "Ошибка сохранения"])
             ->withInput();
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
        //
    }
    public function AllUserNews($id)
    {
        return News::where('user_id', $id)->get();
    }
}
