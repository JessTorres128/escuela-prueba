<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\StudentPostRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('group')->orderBy("id")->get();
        return response()->json($students);
        // return view("welcome")->with(["status" => true, "data" => Student::with('group')->orderBy("id")->get()]);
        // return response()->json(["status" => true, "data" => Student::with('group')->orderBy("id")->get()], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::orderBy("semester")->get();
        return view("student.create",["groups"=>$groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StudentPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentPostRequest $request)
    {

        $student = new Student([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "group_id" => $request->group_id
        ]);
        $student->save();

        return redirect("/");

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Student::find($id) == null){
            return redirect("/");
        }else{
            return view("student.show", ["student" => Student::with("group")->find($id)]);
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
        if(Student::find($id) == null){
            return redirect("/");
        }else{

        $groups = Group::orderBy("semester")->get();
        return view("student.edit", ["student" => Student::with("group")->find($id), "groups" => $groups]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdateRequest $request, $id)
    {
        $student = Student::find($id);
        if($student == null){
            return redirect("/");
        }
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->phone_number = $request->phone_number;
        $student->group_id = $request->group_id;

        $student->save();
        return redirect()->route("student.show",["id" => $student->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if($student == null){
            return redirect("/student/{$id}");
        }
        $student->delete();
        return redirect("/");
    }
}
