<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRssRequest;
use App\Mail\NewsRssClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\NewsRss;

class NewsRssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(NewsRssRequest $request)
    {
      $data = $request->input();

      $data["is_active"] = 1;
    //  dd($data["email"]);
      //$data = ['name'=>'Viktor', 'email'=>'viktonet@gmail.com', 'msg'=>'Наш текст сообщение222'];
      $item = new NewsRss($data);
//dd($item);
      $item->save();

      if($item) {
        Mail::to($data["email"])->send(new NewsRssClass($data));
        return redirect()
          ->route('news.show',$data["news_id"])
          ->with(['success' => "Успешная подписка на новости"]);
      }else{
        return back()
          ->withErrors(['msg' => "Ошибка сохранения"])
          ->withInput();

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
