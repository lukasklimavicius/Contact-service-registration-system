<?php

namespace App\Http\Controllers;

use App\Models\Illness;
use Illuminate\Http\Request;

use DataTables;

class IllnessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('illnesses');
    }

    function add()
    {
        return view('add_illness');
    }

    function add_illness(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $data = $request->all();

        Illness::create([
            'illness_name' => $data['name'],
            'illness_description' => $data['description']
        ]);

        return redirect('illnesses')->with('success', 'Jūsų liga įrašyta!');
    }

}
