<?php

namespace App\Http\Controllers;

use App\User as UserModel;
use Illuminate\Http\Request;
use App\Http\Requests\UserAdd as UserRequest;
use App\Models\Subscriber as SubscriberModel;

/**
 * Class SubscriberController
 * @package App\Http\Controllers
 */
class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('subscribers.create', ['subscribers' => new SubscriberModel()]);
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
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
        $subscribers = SubscriberModel::findOrFail($id);

        return view('subscribers.create', ['subscribers' => $subscribers]);
    }

    /**
     * @param UserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(UserRequest $request, $id)
    {
        $subscribers = SubscriberModel::findOrFail($id);
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
     * @param SubscriberModel $subscriber
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SubscriberModel $subscriber)
    {
        $subscriber->delete();

        return redirect()
            ->back()
            ->with([
                'flash_message' => 'Subscriber ' . $subscriber->email . ' successfully delete.',
            ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editSubscriber()
    {

        return view('lists.edit');
    }
    //    todo-me localization flash message controller Subscribers
}
