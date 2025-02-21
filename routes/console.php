<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use App\Models\User;
use App\Models\Question;




Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');






Artisan::command('users', function () {

    foreach(User::All() as $user) {
        echo "--- " . $user -> full_name . " -- " . $user -> email . "\n";
    }

})->purpose('Show All Users');







Artisan::command('questions', function () {

    foreach(Question::All() as $question) {
        echo "--- " . $question -> title . "\n";
    }

})->purpose('Show All Questions');