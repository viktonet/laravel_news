<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use App\NewsCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $items = News::all();
        $category_data = Newscategory::all();
        //dd($items->first());
        return view('news.index', compact('items','category_data'));
    }

    public function show($id)
    {
        $paginator = News::where('category_id', $id)->paginate(10);
        $category_data = Newscategory::all();
        if(empty($paginator))
        {
            abort(404);
        }
        //dd($items->first());
        return view('news.index', compact('paginator','category_data','id'));
    }
}
