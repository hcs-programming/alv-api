<?php

namespace App\Http\Controllers;

use App\Student;
use App\Http\Resources\Student as StudentResource;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function allInClass($class)
    {
        $students = Student::where('grade', $class)->get();

        return StudentResource::collection($students);
    }
}
