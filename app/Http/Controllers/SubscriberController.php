<?php

namespace App\Http\Controllers;

use App\User as UserModel;
use Illuminate\Http\Request;
use App\Http\Requests\UserAdd as UserRequest;

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
//        $subscribers = SubscriberModel::paginate(5);
        $subscribers = UserModel::findOrFail(\Auth::user()->id)->subscribers()->paginate(5);
        
        return view('subscribers.index', ['subscribers' => $subscribers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscribers.create',['subscribers'=>new SubscriberModel()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // echo $request->has('first_name');
        // dump($request->only(['first_name']));
        // dump($request->except(['first_name']));
        // exit;
//        $this->validator($request->all())->validate();
        $subscriber = SubscriberModel::create([
            'user_id'    => \Auth::user()->id,
            'first_name' => $request->get('first_name'),
            'last_name'  => $request->get('last_name'),
            'email'      => $request->get('email'),
        ]);

        return redirect('/subscribers')
            ->with([
                'flash_message' => 'Subscriber ' . $subscriber->email . ' created successfully',
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $subscribers = SubscriberModel::select(['id', 'first_name', 'last_name', 'email'])
//            ->where(['id' => $id])
//            ->get();
        $subscribers = SubscriberModel::findOrFail($id);

        return view('subscribers.create', ['subscribers' => $subscribers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $this->validator($request->all())->validate();
        $subscribers = SubscriberModel::findOrFail($id);
//        $subscribers->update([
//            'first_name' => $request->get('first_name'),
//            'last_name'  => $request->get('last_name'),
//            'email'      => $request->get('email'),
//        ]);
        $subscribers->fill($request->only([
            'fist_name',
            'last_name',
            'email',
        ]));
        $subscribers->save();

        return redirect('/subscribers')
            ->with([
                'flash_message' => $subscribers->email . ' user data has been successfully updated!',
            ]);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SubscriberModel $subscriber)
    {
//        $subscriber = SubscriberModel::findOrFail($id);
        
        $subscriber->delete();

        return redirect()
            ->back()
            ->with([
                'flash_message' => 'Subscriber ' . $subscriber->email . ' successfully delete.',
            ]);
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


    public function editSubscriber()
    {
        //$subscriber = UserModel::findOrFail(\Auth::user()->id)->subscribers()->paginate(5);
        //
        return view('lists.edit');
        //return redirect()
        //->back()
        //->with(['subscriber'=>$subscriber]);
    }
}
