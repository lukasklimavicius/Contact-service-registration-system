<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $data = User::findOrFail(Auth::user()->id);
        return view('profile', compact('data'));
    }

    function edit_validation(Request $request)
    {
        $request->validate([
            'phone'     =>  'required'
        ]);

        $data = $request->all();

        if(!empty($data['password']))
        {
            $form_data = array(
                'phone'      =>  $data['phone'],
                'password'  =>  Hash::make($data['password'])
            );
        }
        else
        {
            $form_data = array(
                'phone'      =>  $data['phone'],
            );
        }

        User::whereId(Auth::user()->id)->update($form_data);

        return redirect('profile')->with('success', 'Informacija atnaujinta');

    }

}
