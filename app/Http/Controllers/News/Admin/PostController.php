<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Requests\NewsPostUpdateRequest;
use App\Http\Requests\NewsPostCreateRequest;
use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;



class PostController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $paginator = News::where('user_id', '=', \Auth::user()->id)->paginate(15);


      //$categoryList = Newscategory::all();
      //dd($categoryList);
      return view('news.admin.posts.index', compact('paginator'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $item = new News();

      $categoryList = Newscategory::all();

      return view('news.admin.posts.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsPostCreateRequest $request)
    {
      $data = $request->input();

      $item = new News($data);
      $item->save();

      if($item) {
        return redirect()
          ->route('news.admin.posts.edit')
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

      $paginator = News::where('user_id', '=', $id)->paginate(15);

      //$categoryList = Newscategory::all();
      //dd($categoryList);
      return view('news.admin.posts.index', compact('paginator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = News::Find($id);
      if(empty($item))
      {
          abort(404);
      }
      $categoryList = NewsCategory::all();

      return view('news.admin.posts.edit', compact('item', 'categoryList'));
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
        $item = News::Find($id);

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
            ->route('news.admin.posts.edit', $id)
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
      //$result = News::destroy($id);

      //Повне видалення даних з бази
      $result = News::Find($id)->forceDelete();

      if($result){
        return redirect()
          ->route('news.admin.posts.index')
          ->with(['success' => "Запись id[$id] удалена"]);
      }else{
        return back()
          ->withErrors(['msg' => "Ошибка удаления"])
          ->withInput();
      }
    }
}
