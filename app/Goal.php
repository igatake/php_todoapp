<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Goal extends Model
{

    public function tasks() {
        return $this->hasMany('App\task');
    }


    public function getFormattedDueDateAttribute() {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }
}
