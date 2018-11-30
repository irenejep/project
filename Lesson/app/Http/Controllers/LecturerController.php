<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Unit;

use DB;

class LecturerController extends Controller
{
    //
    public function store(lecturer $lecturer){
        lecturer::create([
            'lecturer_name'=>request('lecturer_name'),
            'lecturer_telephone'=>request('lecturer_telephone'),
            'id'=>request('id')
        ]);
         
        return back();
    }
    public function viewLecturer($unit_id){
         $unit =Unit::findOrFail($unit_id);
         $lecturer = $unit->lecturers;
         echo $lecturer;
    }
}
