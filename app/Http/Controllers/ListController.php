<?php

namespace App\Http\Controllers;


use App\Models\ListModel;
use App\User as UserModel;
use Illuminate\Http\Request;
use App\Http\Requests\Create as CreateRequest;

/**
 * Class ListController
 * @package App\Http\Controllers
 */
class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = UserModel::find(\Auth::user()->id)->lists()->paginate(5);

        return view('lists.index', ['lists' => $lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lists.create', ['list' => new ListModel()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Create $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $list = ListModel::create([
            'user_id' => \Auth::user()->id,
            'name'    => $request->get('name'),
        ]);
        $message = \Lang::get('ListMessage.created', ['name' => $list->name]);

        return redirect('/lists')->with([
            'flash_message' => $message,
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
        $list = ListModel::findOrFail($id);
        $subscribers = UserModel::findOrFail(\Auth::user()->id)->subscribers()->get();

        return view('lists.list', [
            'list'        => $list,
            'subscribers' => $subscribers,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = ListModel::findOrFail($id);

        return view('lists.create', ['list' => $list]);
    }


    /**
     * @param CreateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreateRequest $request, $id)
    {
        $list = ListModel::findOrFail($id);
        $list->fill($request->only([
            'name',
        ]));
        $list->save();
        $message = \Lang::get('ListMessage.update', ['name' => $list->name]);

        return redirect('/lists')->with([
            'flash_messages' => $message,
        ]);
    }

    /**
     * @param ListModel $list
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ListModel $list)
    {
        $list->delete();
        $message = \Lang::get('ListMessage.delete', ['name' => $list->name]);

        return redirect()
            ->back()
            ->with([
                'flash_message' => $message,
            ]);
    }

    /**
     * @param $list
     * @param $subscriber
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addSubscriber($list, $subscriber)
    {
        $subscribers = UserModel::findOrFail(\Auth::user()->id)->subscribers()->find($subscriber);
        $list = ListModel::findOrFail($list);

        if ($list->subscribers()->find($subscriber)) {
            $message = \Lang::get('ListMessage.hasAddSubscribers');

            return redirect()
                ->back()
                ->with([
                    'flash_message' => $message,
                ]);
        } else {
            $list->subscribers()->attach($subscriber);
            $message = \Lang::get('ListMessage.addSubscriber');

            return redirect()
                ->back()
                ->with([
                    'flash_message' => $message,
                ]);
        }
    }

    /**
     * @param $list
     * @param $subscriber
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delSubscriber($list, $subscriber)
    {
        $list = ListModel::findOrFail($list);
        $list->subscribers()->detach($subscriber);
        $message = \Lang::get('ListMessage.delSubscriber', ['name' => $list->name]);

        return redirect()
            ->back()
            ->with([
                'flash_message' => $message,
            ]);
    }
}
