@extends('dashboard')
@section('content')
    <h2 class="mt-3">Mano profilis</h2>

    <div class="row mt-4">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>

        @endif
        @yield('content')
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Keisti informaciją</div>
                <div class="card-body">

                    @if(Auth::user()->type == 'User' or Auth::user()->type == 'Admin')
                        <form method="post" action="{{ route('profile.edit_validation') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label><b>Telefono nr.</b></label>
                                <input type="text" name="phone" class="form-control" value="{{ $data->phone }}"/>
                                @if($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->has('phone') }}</span>
                                @endif

                            </div>
                            <div class="form-group mb-3">
                                <label><b>Slaptažodis</b></label>
                                <input type="password" name="password" class="form-control" placeholder="Password"/>
                            </div>
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            <div class="form-group mb-3">
                                <input type="submit" class="btn btn-primary" value="Pakeisti"/>
                            </div>
                        </form>

                    @elseif(Auth::user()->type == 'Company')
                        <form method="post" action="{{ route('profile.edit_validation') }}">
                            <div class="form-group mb-3">
                                <label><b>Įmonės pavadinimas</b></label>
                                <input type="text" name="title" class="form-control" value="{{ $data->title }}"/>
                                @if($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label><b>Miestas</b></label>
                                <input type="text" name="city" class="form-control" value="{{ $data->city }}"/>
                                @if($errors->has('city'))
                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label><b>Gatvė</b></label>
                                <input type="text" name="street" class="form-control" value="{{ $data->street }}"/>
                                @if($errors->has('street'))
                                    <span class="text-danger">{{ $errors->first('street') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label><b>Namo nr.</b></label>
                                <input type="text" name="h_number" class="form-control" value="{{ $data->h_number }}"/>
                                @if($errors->has('h_number'))
                                    <span class="text-danger">{{ $errors->first('h_number') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label><b>Slaptažodis</b></label>
                                <input type="password" name="password" class="form-control" placeholder="Slaptažodis"/>
                            </div>
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif


                            <div class="form-group mb-3">
                                <input type="submit" class="btn btn-primary" value="Pakeisti"/>

                            </div>

                        </form>

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
