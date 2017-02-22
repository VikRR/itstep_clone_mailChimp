<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

/**
 * Class LocalizationController
 * @package App\Http\Controllers
 */
class LocalizationController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function langSwitch ()
    {
        \Session::put('locale', Input::get('locale'));

        return redirect()->action('MainController@index');
    }
}
