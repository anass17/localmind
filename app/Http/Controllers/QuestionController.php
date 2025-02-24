<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Models\Question;

class QuestionController extends Controller {
    public function index(Request $request) {

        $city = request('city') ? request('city') : '';

        $moroccanCities = config('cities');
        // $questions = Question::with('user') -> paginate(5);
        $questions = Question::with('user')
        ->where(function ($query) {

            $search = request('search') ? request('search') : '';

            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');
        })
        ->where('location', 'like', '%' . $city . '%')
        ->paginate(5);

        return view('Questions.index', compact('questions', 'moroccanCities'));
    }

    public function create() {

        $moroccanCities = config('cities');

        return view('Questions.create', compact('moroccanCities'));
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

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'question_id' => 'required|integer|min:1',
            'title' => 'required|between:3,255',
            'content' => 'required|min:10', 
            'location' => 'required|min:3', 
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors(['data' => 'The data you entered is not valid']);
        }

        $question = Question::find($request -> question_id);

        if ($question) {
            $question -> title = $request -> title;
            $question -> content = $request -> content;
            $question -> location = $request -> location;

            $question -> save();

            return Redirect::route('questions.show', $question -> id);
        } else {
            return Redirect::back()->withErrors(['data' => 'The question you tried to update does not exist']);
        }
        
    }

    public function destroy(int $id) {
        Question::destroy($id);
        return Redirect::route('questions.index');
    }
}