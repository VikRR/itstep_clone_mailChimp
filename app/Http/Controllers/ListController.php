<?php

namespace App\Http\Controllers;



use App\Models\ListModel;
use Illuminate\Http\Request;
use App\User as UserModel;
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

        // $lists = ListModel::paginate(5);
        // return view('lists.index', ['lists' => $lists]);

        $lists = UserModel::find(\Auth::user()->id)->lists()->paginate(2);

        return view('lists.index',['lists'=>$lists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lists.create',
            ['list'=>new ListModel()]);
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

        return redirect('/lists')->with([
            'flash_message' => 'List ' . $list->name . ' created successfully',
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
        $list = ListModel::findOrFail($id);
        return view('lists.create',['list'=>$list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRequest $request, $id)
    {
        $list = ListModel::findOrFail($id);
        $list->fill($request->only([
            'name'
            ]));
        $list->save();
        return redirect('/lists')
        ->with([
            'flash_message'=>'List '.$list->name.' successfully update'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *

     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListModel $list)
    {
        // $list = ListModel::findOrFail($id);
        $list->delete();

        return redirect()
            ->back()
            ->with([
                'flash_message' => 'List ' . $list->name . ' successfully delete.',
            ]);
    }
}
