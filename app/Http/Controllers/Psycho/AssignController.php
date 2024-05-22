<?php

namespace App\Http\Controllers\Psycho;

use App\Http\Controllers\Controller;
use App\Models\Assign;
use Illuminate\Http\Request;
use App\Models\User;

class AssignController extends Controller
{

    public function index()
    {
        return view('psychologist.games.assign');
    }    

    public function showUsers($id)
    {

        $id_juego = $id;
        
        $user = User::paginate(10);

        $isAssigned = Assign::where('game_id', $id_juego)->get();
        $assigned = []; 
        foreach ($isAssigned as $assign) {
            $assigned[] = $assign->student_id;
        }   

        return view('psychologist.games.assign', ['users' => $user, 'id_juego' => $id_juego, 'assigned' => $isAssigned ]);
    }

    public function assignUsers(Request $request)
    {

        // Access the 'id' parameter from the request
        // dd($request->route('id'));
        $id_juego = $request->route('id');

        $user = $request->user_id;
        $assign = new Assign();

        $assign->student_id = $user;
        $assign->game_id = $id_juego;

        try {
            $assign->save();
            return redirect()->back()->with('success', 'Usuarios asignados correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        if(session('success'))
        {
            return redirect()->back()->with('success', 'Usuarios asignados correctamente');
        }
        else
        {
            return redirect()->back()->with('error', 'Error al asignar usuarios');
        }
    }
}
