<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Requests\NewsPostUpdateRequest;
use App\Http\Requests\NewsPostCreateRequest;
use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $paginator = News::paginate(15);


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
        dd(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__);
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

        if(empty($data['slug'])){
          $data['slug'] = Str::slug($data['title']);
        }

        if(empty($item->published_at) && $data['is_published']){
          $data['published_at'] = Carbon::now();
        }
        
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
        dd(__METHOD__, $id);
    }
}
