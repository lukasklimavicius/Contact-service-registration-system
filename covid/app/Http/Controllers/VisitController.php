<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;

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

    function index_company()
    {
        return view('visit_for_company');
    }

    function add()
    {
        $data = User::where('type', 'Company');
        $companies = $data->get();

        return view('add_visit', compact('companies'));
    }

    function add_visit(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'date_from' => 'required',
            'date_to' => 'required'
        ]);

        $data = $request->all();

        Visit::create([
            'visitor_id' => Auth::id(),
            'time_from' => $data['date_from'],
            'time_to' => $data['date_to'],
            'visited_company' => $data['company']
        ]);

        return redirect('visit')->with('success', 'Jūsų vizitas įrašytas!');
    }

    public function visit_edit($id)
    {
        $data = User::where('type', 'Company');
        $companies = $data->get(['id', 'title']);

        $visitQuery = Visit::join('users', 'visits.visited_company', '=', 'users.id')
            ->where('visits.id', '=', $id);

        $visit = $visitQuery->get(['visits.id', 'users.title', 'visits.time_from', 'visits.time_to']);

        return view('edit_visit')->with(compact('visit', 'companies'));

    }

    function visit_update(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'date_from' => 'required',
            'date_to' => 'required'
        ]);

        $data = $request->all();

        $form_data = array(
            'visited_company' => $data['company'],
            'time_from' => str_replace('T', ' ', $data['date_from']) . ':00',
            'time_to' => str_replace('T', ' ', $data['date_to']) . ':00'
        );

        Visit::whereId($data['visit_id'])->update($form_data);

        return redirect('visit')->with('success', 'Vizito informacija atnaujinta!');
    }

    function delete($id)
    {
        $data = Visit::findOrFail($id);

        $data->delete();

        return redirect('visit')->with('success', 'Pasirinktas vizitas ištrintas');
    }

    function fetch_all(Request $request)
    {
        if ($request->ajax()) {
            $query = Visit::join('users', 'users.id', '=', 'visits.visited_company')
                ->where('visits.visitor_id', '=', Auth::user()->id);

            $data = $query->get(['visits.id', 'users.title', 'visits.time_from', 'visits.time_to']);

            return DataTables::of($data)->addColumn('action', function ($row) {

                return '<a href="/visit/edit/' . $row->id . '" class="btn btn-warning btn-sm">Keisti</a>&nbsp;
<a href="/visit/mark/' . $row->id . '" class="btn btn-danger btn-sm">Susirgau</a>&nbsp;
<button type="button" class="btn btn-secondary btn-sm delete" data-id="' . $row->id . '">Atšaukti</button>&nbsp;';


            })->editColumn('time_from', function ($row) {
                return str_replace('T', ' ', date('Y-m-d\TH:i', strtotime($row->time_from)));
            })->editColumn('time_to', function ($row) {
                return str_replace('T', ' ', date('Y-m-d\TH:i', strtotime($row->time_to)));
            })->rawColumns(['action'])
                ->make(true);
        }
    }

    function fetch_all_company(Request $request)
    {
        if ($request->ajax()) {
            $query = Visit::join('users', 'users.id', '=', 'visits.visitor_id')
                ->where('visits.visited_company', '=', Auth::user()->id);

            $data = $query->get();

            return DataTables::of($data)
                ->editColumn('name', function ($row) {
                    return $row->name . ' ' . $row->surname;
                })
                ->editColumn('time_from', function ($row) {
                    return str_replace('T', ' ', date('Y-m-d\TH:i', strtotime($row->time_from)));
                })->editColumn('time_to', function ($row) {
                    return str_replace('T', ' ', date('Y-m-d\TH:i', strtotime($row->time_to)));
                })->rawColumns(['name'])
                ->make(true);
        }
    }

}
