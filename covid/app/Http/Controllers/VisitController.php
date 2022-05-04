<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Visit;

use DataTables;

use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('visit');
    }

    function add()
    {
        //return view('add_visit');

        $data = User::where('type', 'Company');
        $companies = $data->get(['id', 'title']);

        return view('add_visit', compact('companies'));
    }

    function add_visit(Request $request)
    {
        $request->validate([
            'company'       =>  'required',
            'date_from'        =>  'required',
            'date_to'        =>  'required'
        ]);

        $data = $request->all();

        Visit::create([
            'visitor_id' => Auth::id(),
            'time_from'        =>  $data['date_from'],
            'time_to'        =>  $data['date_to'],
            'visited_company'       =>  $data['company']
        ]);

        return redirect('visit')->with('success', 'Jūsų vizitas įrašytas!');
    }

    function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $query = Visit::join('users', 'users.id', '=', 'visits.visited_company')
                ->where('visits.visitor_id', '=', Auth::user()->id);

           /* if(Auth::user()->type == 'Company')
            {
                $query->where('visitors.visitor_enter_by', '=', Auth::user()->id);
            }
           */

            $data = $query->get(['users.title', 'visits.time_from', 'visits.time_to']);

            return DataTables::of($data)->addColumn('action', function($row){

                    return '<a href="/visitor/view/'.$row->id.'" class="btn btn-info btn-sm">View</a>&nbsp;
<a href="/visitor/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;
<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';


            })->rawColumns(['action'])
                ->make(true);
        }
    }
}
