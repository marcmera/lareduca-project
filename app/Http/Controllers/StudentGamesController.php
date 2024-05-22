<?php

namespace App\Http\Controllers;


use App\Models\Assign;
use App\Models\Game;
use Illuminate\Http\Request;

class StudentGamesController extends Controller
{
    public function index()
    {
        $assign = Assign::where('student_id', auth()->user()->id)->with('game','user')->get();
        // dd($assign);
        $games = Game::all();

        return view('web.sections.student.games', ['assigned' => $assign, 'games' => $games]);
    }
}
