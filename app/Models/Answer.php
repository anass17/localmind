<?php

namespace App\Models;

// use App\Models\Question;
// use App\Models\Question;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
