<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lecturer extends Model
{
    protected $primaryKey= 'lecturer_id';
    public function unit(){
        return $this->belongsTo(
            'App\Unit');
        }
}
