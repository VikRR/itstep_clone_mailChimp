<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use App\Jobs\SendEmail as SendEmailJob;


/**
 * Class SendController
 * @package App\Http\Controllers
 */
class SendController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        $lists = UserModel::find(\Auth::user()->id)
            ->lists()
            ->get();

        return view('send.form', ['lists' => $lists]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request)
    {
        dispatch(new SendEmailJob(
            $request->get('list_id'),
            $request->get('message'),
            $request->get('subject'),
            \Auth::user()->id
        ));

        return redirect()
            ->back()
            ->with([
                'flash_message' => 'Emails successfully send.',
            ]);
    }

}