<?php

namespace App\Observers;

use App\News;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NewsPostObserver
{
    /**
     * Handle the news "created" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function created(News $news)
    {
        //
    }
    public function creating(News $news)
    {
      $this->setSlug($news);
      $this->setPublishedAt($news);
      $this->setHtml($news);
      $this->setUser($news);
    }
    /**
     * Handle the news "updated" event.
     *
     * @param  \App\News  $news
     * @return void
     */


    public function updated(News $news)
    {


    }

    public function updating(News $news)
    {

        $this->setSlug($news);
        $this->setPublishedAt($news);
    }

    protected function setPublishedAt(News $news){
      $needSetPublished = empty($news->published_at) && $news->is_published;
      //
      if($needSetPublished){
        $news->is_published = Carbon::now();
      }
    }
    protected function setSlug(News $news){
      if(empty($news->slug)){
        $news->slug = Str::slug($news->title);
      }

    }

    protected function setHtml(News $news){
      if($news->isDirty('content_raw')){
        $news->content_html = $news->content_raw;
      }
    }

    protected function setUser(News $news){

        $news->user_id = auth()->id() ?? 2;

    }

    /**
     * Handle the news "deleted" event.
     *
     * @param  \App\News  $news
     * @return void
     */
     public function deleting(News $news)
     {
         //dd(__METHOD__, $news);
         //return false;
     }

    public function deleted(News $news)
    {
        //
    }

    /**
     * Handle the news "restored" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function restored(News $news)
    {
        //
    }

    /**
     * Handle the news "force deleted" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        //
    }
}
