<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\News\PostController;
use App\Http\Requests\NewsCommentsRequest;
use Illuminate\Http\Request;

use App\NewsComments;

class CommentsController extends PostController
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function store(NewsCommentsRequest $request)
    {
      $data = $request->input();
    //  dd($data);
      $item = new NewsComments($data);
      $item->save();

      if($item) {
        return redirect()
          ->route('news.show', $item->news_id)
          ->with(['success' => "Успешно сохранено"]);
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
