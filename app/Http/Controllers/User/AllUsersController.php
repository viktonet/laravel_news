<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserCreateRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\User;
use App\News;

class AllUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //dd(\Auth::user());
        $users = User::all();
        $NewsList = $this->AllUserNews(\Auth::user()->id);
        if($NewsList){
          $countNews = count($NewsList);
        }else{
          $countNews = 0;
        }
        //News::where('user_id', \Auth::user()->id)->get();

        return view('user.all', compact('countNews','users'));
    }

    public function create()
    {
      $item = new User();
      $create = 1;

      return view('user.edit_all', compact('item','create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
      $data = $request->input();
      $data['date_of_birthday'] = date("Y-m-d", strtotime($data['date_of_birthday']));
      $data['email_verified_at'] = now();
      $data['password'] = Hash::make($data['password']);
      $item = new User($data);
      $item->save();

      if($item) {
        return redirect()
          ->route('user.all.edit',$item->id)
          ->with(['success' => "Успешно сохранено"]);
      }else{
        return back()
          ->withErrors(['msg' => "Ошибка сохранения"])
          ->withInput();

      }
    }

    public function edit($id)
    {

        $item = User::Find($id);
        if(\Auth::user()->role_id ==1 and \Auth::user()->role_id == $item->role_id OR \Auth::user()->role_id !=1 AND $item->role_id != 1) {
            return view('user.edit_all', compact('item'));
        }else{
          return back()
            ->withErrors(['msg' => "Ошибка доступа"])
            ->withInput();
        }


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

         $item = User::Find($id);

         if(empty($item)){
           return back()
             ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
             ->withInput();
         }

         $data = $request->all();
         $data['date_of_birthday'] = date("Y-m-d", strtotime($data['date_of_birthday']));

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
      $result = User::Find($id)->forceDelete();

      if($result){
        return redirect()
          ->route('user.all.index')
          ->with(['success' => "Запись id[$id] удалена"]);
      }else{
        return back()
          ->withErrors(['msg' => "Ошибка удаления"])
          ->withInput();
      }
    }
    public function AllUserNews($id)
    {
        return News::where('user_id', $id)->get();
    }
}
