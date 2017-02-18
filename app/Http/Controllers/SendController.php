<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use App\Models\ListModel;
use App\Jobs\SendEmail as SendEmailJob;

class SendController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        $list = UserModel::find(\Auth::user()->id)
                ->lists()->get();
        return view('send.form',['list'=>$list]);
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
//        $mail = new TestMail($request->get('message'),
//            $request->get('subject'));
////        \Mail::to($request->get('to'))->send($mail);
//        \Mail::to($request->get('to'))->queue($mail);
//        
//        $when = \Carbon\Carbon::now()->addMinutes(1);
//        $mail = new TestMail($request->get('message'),$request->get('subject'));
//        \Mail::to($request->get('to'))
//                ->later($when, $mail);
//                
//        $listSubscribers = ListModel::findOrFail($request->get('list_id'))
//                ->subscribers()
//                ->get();
//        foreach ($listSubscribers as $subscriber){
//            $mail = new TestMail($request->get('message'),$request->get('subject'));
//            \Mail::to($subscriber->email)
//               ->send($mail);
//        }
        
        dispatch(new SendEmailJob(
                $request->get('listId'),
                $request->get('messsage'),
                $request->get('subject'),
                \Auth::user()->id
                ));
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