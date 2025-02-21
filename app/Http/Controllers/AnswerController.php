<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Models\Answer;

class AnswerController extends Controller
{

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'content' => 'required|min:5', 
            'question_id' => 'required|integer|min:1',
        ]);

        // print_r($_POST);

        // exit;

        Session::put('user_id', 4);

        if ($validator->fails()) {
            return Redirect::back()->withErrors(['data' => 'The data you entered is not valid']);
        }

        $answer = new Answer();
        
        $answer -> content = $request -> content;
        $answer -> question_id = $request -> question_id;
        $answer -> user_id = Session::get('user_id');

        $answer -> save();

        return Redirect::back();
    }

}
