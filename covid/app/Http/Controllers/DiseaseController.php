<?php

namespace App\Http\Controllers;

use App\Models\Illness;
use App\Models\Disease;
use Illuminate\Http\Request;

use DataTables;

class DiseaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function mark_visit($id)
    {
        $diseases = Illness::all();

        return view('mark_visit')->with(['visit_id' => $id])->with('diseases', $diseases);
    }

    function visit_mark(Request $request)
    {
        $request->validate([
            'disease_id' => 'required',
            'visit_id' => 'required|unique:diseases,visit_id',
        ]);

        $data = $request->all();

        Disease::create([
            'user_id' => $data['user_id'],
            'disease_id' => $data['disease_id'],
            'visit_id' => $data['visit_id']
        ]);

        return redirect('visit')->with('success', 'Sėkmingai perspėjote kitus klientus apie savo ligą!');
    }

}
