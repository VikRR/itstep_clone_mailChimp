<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function model(){


        // Subscriber::create([
        //     'user_id' => \Auth::user()->id,
        //     'first_name' => 'John',
        //     'last_name' => 'Doe',
        //     'email' => 'john_doe@mail.com'
        //     ]);

        // $subscriber = new Subscriber();
        // $subscriber->user_id = \Auth::user()->id;
        // $subscriber->first_name = 'Dan';
        // $subscriber->last_name = 'Boss';
        // $subscriber->email = 'db@ro.ru';
        // $subscriber->save();

        // $subscriberId = 2;
        // $subscriber = Subscriber::find($subscriberId);
        // $subscriber->email = 'john_doe_2@mail.com';
        // $subscriber->save();

/*        $subscriberId = 20;
        $subscriber = Subscriber::findOrFail($subscriberId);
        $subscriber = Subscriber::find($subscriberId);
        $subscriber->email = 'john_doe_2@mail.com';
        $subscriber->save();*/


        // echo '<pre>';
        // print_r(Subscriber::where('id', '1')->first());
        // print_r(Subscriber::where('id', '1')->get());
        // print_r(Subscriber::where('id', '1')->get()->toArray());
        // echo Subscriber::where('id', '1')->toSql();
        // echo '</pre>';
        // Subscriber::where('first_name', 'John')->toSQL();

        // Subscriber::find(1)->delete();

        echo'<pre>';
        print_r(User::find(1)->subscribers()->get()->toArray());
        echo'</pre>';

    }
}
