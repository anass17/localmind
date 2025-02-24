<?php

namespace App\Models;


use App\Models\Answer;
use Illuminate\Database\Eloquent\Model;

class Question extends Model {
    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
