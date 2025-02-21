<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
