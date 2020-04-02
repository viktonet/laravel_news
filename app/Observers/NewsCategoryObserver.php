<?php

namespace App\Observers;

use App\NewsCategory;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NewsCategoryObserver
{
    /**
     * Handle the news category "created" event.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return void
     */
    public function created(NewsCategory $newsCategory)
    {
        //
    }

    public function creating(NewsCategory $newsCategory)
    {
        $this->setSlug($newsCategory);

    }
    /**
     * Handle the news category "updated" event.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return void
     */
    public function updated(NewsCategory $newsCategory)
    {
        //
    }

    public function updating(NewsCategory $newsCategory)
    {
      $this->setSlug($newsCategory);

    }

    protected function setSlug(NewsCategory $newsCategory){
      if(empty($newsCategory->slug)){
        $newsCategory->slug = Str::slug($newsCategory->title);
      }

    }
    /**
     * Handle the news category "deleted" event.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return void
     */
    public function deleted(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Handle the news category "restored" event.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return void
     */
    public function restored(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Handle the news category "force deleted" event.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return void
     */
    public function forceDeleted(NewsCategory $newsCategory)
    {
        //
    }
}
