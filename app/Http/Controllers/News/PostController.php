<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\News;
use App\NewsCategory;
use App\NewsComments;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = News::where('is_published', 1)->paginate(15);
        $category_data = Newscategory::all();

        $id='';
        //dd($items->first());
        return view('news.index', compact('paginator','category_data','id'));
    }

    public function show($id)
    {
        $item = News::Find($id);
        $category_data = Newscategory::all();
        $news_comments = NewsComments::where('news_id', $item->id)->get();
        $id=$item->category_id;
        if(empty($item))
        {
            abort(404);
        }
        //dd($items->first());
        return view('news.post', compact('item','category_data','id','news_comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
