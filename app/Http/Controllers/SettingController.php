<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use App\Models\EmailSettings;

class SettingController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $settings = EmailSettings::all();

        return view('settings.index', ['settings' => $settings]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setting(Request $request)
    {
        $user = UserModel::findOrFail(\Auth::user()->id);
        $setting = EmailSettings::findOrFail($request->setting);
        \Config::set('mail.driver', $setting->type);
        if ($user->sendTypes() !== null) {
            $user->sendTypes()->detach();
            $user->sendTypes()->attach($setting);
        } else {
            $user->sendTypes()->attach($setting);
        }

        return redirect('/');
    }

}


