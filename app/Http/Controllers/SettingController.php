<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as UserModel;
use App\Models\EmailSettings;

/**
 * Class SettingController
 * @package App\Http\Controllers
 */
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

        if ($user->sendTypes() !== null) {
            $user->sendTypes()->detach();
            $user->sendTypes()->attach($setting);
        } else {
            $user->sendTypes()->attach($setting);
        }
        $message = \Lang::get('Setting.success', ['type' => $setting->type]);

        return redirect('/email/send')
            ->with([
                'flash_message' => $message,
            ]);
    }

}


