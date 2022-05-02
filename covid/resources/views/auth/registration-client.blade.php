@extends('dashboard')
@section('content')

<main class="signup-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
            	<div class="card">
                    <h3 class="card-header text-center">Kliento registracija</h3>
                    <div class="card-body">
                    	<form action="{{ route('register-client.custom') }}" method="POST">
                    		@csrf
                            <div class="form-group mb-3">
                                <input type="Email" name="email" class="form-control" placeholder="El. paštas" />
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Slaptažodis" />
                                @if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                    		<div class="form-group mb-3">
                    			<input type="Text" name="name" class="form-control" placeholder="Vardas" />
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                    		</div>
                    		<div class="form-group mb-3">
                    			<input type="surname" name="surname" class="form-control" placeholder="Pavardė" />
                                @if($errors->has('surname'))
                                <span class="text-danger">{{ $errors->first('surname') }}</span>
                                @endif
                    		</div>
                            <div class="form-group mb-3">
                                <input type="text" name="personal_code" class="form-control" placeholder="Asmens kodas" />
                                @if ($errors->has('personal_code'))
                                    <span class="text-danger">{{ $errors->first('personal_code') }}</span>
                                @endif
                            </div>
                    		<div class="form-group mb-3">
                    			<input type="text" name="phone" class="form-control" placeholder="Telefono nr." />
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                    		</div>

                    		<div class="d-grid mx-auto">
                    			<button type="submit" class="btn btn-dark btn-block">Registruotis</button>
                    		</div>
                    	</form>
                        <br />
                        <div class="text-center">
                            <p>Jau užsiregistravote? <a href="{{ route('login') }}">Prisijunkite</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
