<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber as SubscriberModel;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscribers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo $request->has('first_name');
        // dump($request->only(['first_name']));
        // dump($request->except(['first_name']));
        // exit;
        $this->validator($request->all())->validate();
        SubscriberModel::create([
            'user_id'    => \Auth::user()->id,
            'first_name' => $request->get('first_name'),
            'last_name'  => $request->get('last_name'),
            'email'      => $request->get('email'),
        ]);

        return redirect('subscribers/'.\Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscribers = SubscriberModel::select('id', 'first_name', 'last_name', 'email')
            ->where(['user_id' => $id])
            ->get();
        dump($subscribers);

        return view('subscribers.list', ['subscribers' => $subscribers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscribers = SubscriberModel::select(['id', 'first_name', 'last_name', 'email'])
            ->where(['id' => $id])
            ->get();
        dump($subscribers);

        return view('subscribers.update', ['subscribers' => $subscribers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $subscribers = SubscriberModel::find($id);
        $subscribers->update([
                'first_name' => $request->get('first_name'),
                'last_name'  => $request->get('last_name'),
                'email'      => $request->get('email'),
            ]);

        //return redirect()->action('SubscriberController@show',[\Auth::user()->id]);
        return view('subscribers.list',['subscribers' => $subscribers]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = SubscriberModel::find($id);
        $subscriber->delete();

        return redirect('/subscribers/'.\Auth::user()->id);
    }

    /**
     * @param array $data
     * @return \Illuminate\Validation\Validator
     */
    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'first_name' => 'required|max:128|min:2',
            'last_name'  => 'required|max:128|min:2',
            'email'      => 'required|email|max:128',
        ]);
    }
}
