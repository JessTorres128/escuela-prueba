<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\GroupPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(["status" => true, "data" => Group::with('students')->orderBy("id", "desc")->get()], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("group.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\GroupPostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupPostRequest $request)
    {
        
        $group = new Group([
            "semester" => $request->semester,
            "group" => strtoupper($request->group),
            "session" => $request->session
        ]);
        $group->save();

        return redirect("/");

    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Group::find($id) == null){
            return response()->json(['status' => false], 404);
        }else{
            return view("group.show", ["group" => Group::with("students")->find($id)]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Group::find($id) == null){
            return redirect("/");
        }else{

        return view("group.edit", ["group" => Group::find($id)]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(GroupPostRequest $request, $id)
    {
        $group = Group::find($id);
        if($group == null){
            return response()->json(['status' => false], 404);
        }
        $group->semester = $request->semester;
        $group->group = strtoupper($request->group);
        $group->session = $request->session;

        $group->save();
        return redirect()->route("group.show",["id"=> $group->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        if($group == null){
            return redirect()->route("group.show", ["id" => $id]);
        }
        $group->delete();
        return redirect("/");
    }
}
