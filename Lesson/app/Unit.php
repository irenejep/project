<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
   protected $primaryKey= 'units_id';
   public function lesson(){
        return $this->belongsTo(
            'App\Lesson');
}
    public function lecturers(){
        return $this->belongsTo(lecturer::class,'lecturer_id');
    }
}
