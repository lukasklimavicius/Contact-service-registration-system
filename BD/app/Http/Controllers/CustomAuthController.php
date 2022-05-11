<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function custom_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            return redirect('profile');
        }

        return redirect('login')->with('error', 'Neteisingi prisijungimo duomenys');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function custom_registration(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'title' => 'required',
            'city' => 'required',
            'street' => 'required',
            'h_number' => 'required'
        ]);

        $data = $request->all();

        User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'title' => $data['title'],
            'city' => $data['city'],
            'street' => $data['street'],
            'h_number' => $data['h_number'],
            'type' => 'Company'
        ]);

        return redirect('registration')->with('success', 'Sėkmingai užsiregistravote');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $data = Disease::join('visits', 'visits.id', '=', 'diseases.visit_id')->where('visits.visitor_id', '!=', Auth::user()->id)->join('illnesses', 'illnesses.id', '=', 'diseases.disease_id');
            $marked_visits = $data->get();
            //dd($marked_visits->time_from);

            $data = Visit::join('users', 'users.id', '=', 'visits.visited_company')->where('visits.visitor_id', '=', Auth::user()->id);
            $my_visits = $data->get();


            return view('main')->with(compact('marked_visits', 'my_visits'));
        }

        return redirect('login');
    }

    public function registration_client()
    {
        return view('auth.registration-client');
    }

    public function custom_registration_client(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'name' => 'required',
            'surname' => 'required',
            'personal_code' => array('required', 'regex:/^([1-6]|[9])\d{2}[0-1][0-9][0-3][0-9]\d{4}/'),
            'phone' => 'required|numeric'
        ]);

        $data = $request->all();

        User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'surname' => $data['surname'],
            'personal_code' => $data['personal_code'],
            'phone' => $data['phone'],
            'type' => 'User'
        ]);

        return redirect('registration-client')->with('success', 'Sėkmingai užsiregistravote');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
