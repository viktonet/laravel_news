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


        if(isset($_GET["popular"]) AND $_GET["popular"]=="true"){
           $whereIn = $this->getMaxComments();
           $paginator = News::whereIn('id', $whereIn)->paginate(1000);
        }else{
          $paginator = News::where('is_published', 1)->paginate(15);
        }
        //dd($paginator);

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

    function getMaxComments() {
      $countComments = NewsComments::where('is_published', 1)->pluck('news_id','id');
      $tmp = array();
      foreach($countComments as $key=>$val){
        $tmp[$key]=$val;
      }
      $dataCountComm = array_count_values($tmp);
      arsort($dataCountComm);
      $txt= [];

      foreach($dataCountComm as $key=>$val){
        if($val>2){
          $txt[]=$key;

        }

      }
      return $txt;

    }

}
