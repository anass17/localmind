<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Models\Question;

class QuestionController extends Controller {
    public function index() {
        $questions = Question::with('user') -> get();
        return view('Questions.index', compact('questions'));
    }

    public function create() {
        return view('Questions.create');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|between:3,255',
            'content' => 'required|min:10', 
            'location' => 'required|min:3', 
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors(['data' => 'The data you entered is not valid']);
        }

        $question = new Question();
        
        $question -> title = $request -> title;
        $question -> content = $request -> content;
        $question -> location = $request -> location;
        $question -> user_id = Session::get('user_id');

        $question -> save();

        return Redirect::to('/questions');
    }

    public function show(int $id) {
        $question = Question::with('answers.user')->find($id);
        return view('Questions.show', compact('question'));
    }

    public function edit(int $id) {
        $question = Question::with('user')->find($id);
        return view('Questions.edit', compact('question'));
    }
}