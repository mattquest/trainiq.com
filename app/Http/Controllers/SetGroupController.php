<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSetGroupRequest;
use App\Http\Requests\UpdateSetGroupRequest;
use App\Models\Session;
use App\Models\Set;
use App\Models\SetGroup;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SetGroupController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSetGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSetGroupRequest $request)
    {
        $input = $request->all();
        $session = Session::getOrCreateTodaysSession();
        $set_group_id = $session->setGroups()->create()->id;
        array_map(fn($set) => Set::create([
            'movement_id' => $set['movement_id'],
            'reps' => $set['reps'],
            'set_group_id' => $set_group_id,
            'performed_effort' => $set['performed_effort'] ?? null,
            'performed_time_constraint' => $set['performed_time_constraint'] ?? null,
        ]), $input['sets']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SetGroup  $setGroup
     * @return \Illuminate\Http\Response
     */
    public function show(SetGroup $setGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SetGroup  $setGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(SetGroup $setGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSetGroupRequest  $request
     * @param  \App\Models\SetGroup  $setGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSetGroupRequest $request, SetGroup $setGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SetGroup  $setGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetGroup $setGroup)
    {
        //
    }
}
