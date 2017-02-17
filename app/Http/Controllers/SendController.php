<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        return view('send.form');
    }

    /**
     * @param Request $request
     */
    public function send(Request $request)
    {
        /*\Mail::raw($request->get('message'),
          function ($message) use ($request){
            $message->to($request->get('to'))
              ->subject($request->get('subject'));
          });*/

        /*$data=['text'=>$request->get('message')];
          //$data=['text'=>'сообщение'];
        \Mail::send('emails.test',$data,
          function ($message) use ($request){
            $message->to($request->get('to'))
              ->subject($request->get('subject'));
          });*/
        $mail = new TestMail($request->get('message'),
            $request->get('subject'));
        \Mail::to($request->get('to'))->send($mail);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showsettings()
    {
        return view('send.settings');
    }

    /**
     * @param Request $request
     */
    public function setsettings(Request $request)
    {
        echo "settings=" . $request->type;
    }
}
