<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsRssClass extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($data)
     {
       $this->name = $data['name'];
       $this->email = $data['email'];
       $this->msg = "Сайта";
     }

    /**
     * Build the message.
     *
     *
     * @return $this
     */
    public function build()
    {
      return $this->view('emails.news.rss_confirm')->with([
        'name'=>$this->name,
        'email'=>$this->email,
        'msg'=>$this->msg,
      ])->subject('Ваша подписка на новости.');
    }
}
