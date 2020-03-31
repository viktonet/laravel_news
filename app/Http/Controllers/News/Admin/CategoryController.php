<?php

namespace App\Http\Controllers\News\Admin;

//use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCategoryUpdateRequest;
use App\Http\Requests\NewsCategoryCreateRequest;
use App\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = NewsCategory::paginate(15);
        return view('news.admin.category.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new NewsCategory();

        $categoryList = Newscategory::all();

        return view('news.admin.category.edit', compact('item', 'categoryList'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCategoryCreateRequest $request)
    {
        $data = $request->input();
        if(empty($data['slug'])){
          $data['slug'] = Str::slug($data['title']);
        }

        $item = new NewsCategory($data);
        $item->save();

        if($item) {
          return redirect()
            ->route('news.admin.category.index')
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
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = NewsCategory::Find($id);
        $categoryList = NewsCategory::all();

        return view('news.admin.category.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsCategoryUpdateRequest $request, $id)
    {
      //$id = 1111;
        $item = NewsCategory::Find($id);

        if(empty($item)){
          return back()
            ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
            ->withInput();
        }

        $data = $request->all();
        if(empty($data['slug'])){
          $data['slug'] = Str::slug($data['title']);
        }
        //$data = $request->except(['_method', '_token', 'button']);
        $result = $item->fill($data)->save();

        if($result){
          return redirect()
            ->route('news.admin.category.edit', $id)
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
        dd(__METHOD__);
    }
}
