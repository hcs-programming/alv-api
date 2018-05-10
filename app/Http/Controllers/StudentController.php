<?php

namespace App\Http\Controllers;

use App\Day;
use App\Entry;
use App\Student;
use App\Http\Resources\Student as StudentResource;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $grades = [
        'K4',
        'K5',
        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        '11',
        '12',
    ];

    public function allInClass($class)
    {
        $today = $this->today($class);
        $students = Student::where('grade', $class)->get();

        if($today) {
            $students->load(['entry' => function($query) use ($today) {
                $query->where('day_id', $today->id);
            }]);
        }

        return StudentResource::collection($students);
    }

    public function todaysEntries()
    {
        $days = Day::whereDay('day', date('d'))->get();
        $days = $days->keyBy('grade');
        $grades = collect();

        foreach($this->grades as $grade) {
            $gradeDay = $days->get($grade);

            if($gradeDay) {
                $students = Student::where('grade', $grade)->get();
                $students->load(['entry' => function($query) use ($gradeDay) {
                    $query->where('day_id', $gradeDay->id);
                }]);

                $grades->push(['name' => $grade, 'people' => StudentResource::collection($students)]);
            } else {
                $grades->push(['name' => $grade, 'people' => null]);
            }
        }

        return $grades;
    }

    public function saveClass(Request $request, $class)
    {
        $today = $this->today($class);

        if(!$today) {
            $today = Day::create(['grade' => $class, 'day' => date('Y-m-d')]);
        } else {
            Entry::where('day_id', $today->id)->delete();
        }

        foreach($request->all() as $student)
        {
            Entry::create([
                'day_id' => $today->id,
                'student_id' => $student['id'],
                'attendance' => $student['attendance'],
                'lunch' => $student['lunch'],
                'beard' => $student['beard'],
                'belt' => $student['belt'],
                'shoes' => $student['shoes'],
                'uniform' => $student['uniform'],
            ]);
        }
    }

    private function today($class)
    {
        return Day::whereDay('day', date('d'))->where('grade', $class)->first();
    }
}
