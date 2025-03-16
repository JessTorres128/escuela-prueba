<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    

    public function index(){
        $students = Student::with('group')->orderBy("id")->paginate(8, "*", "students");
        $groups = Group::with('students')->orderBy("id", "desc")->paginate(4, "*", "groups");
        return view("welcome", [
            "students" => $students,
            "groups" => $groups
        ]);
    }
}
