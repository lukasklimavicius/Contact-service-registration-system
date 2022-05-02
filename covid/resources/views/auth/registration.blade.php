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
                    <h3 class="card-header text-center">Įmonės registracija</h3>
                    <div class="card-body">
                    	<form action="{{ route('register.custom') }}" method="POST">
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
                    			<input type="Text" name="title" class="form-control" placeholder="Įmonės pavadinimas" />
                                @if($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                    		</div>
                    		<div class="form-group mb-3">
                    			<input type="text" name="city" class="form-control" placeholder="Miestas" />
                                @if($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                @endif
                    		</div>
                            <div class="form-group mb-3">
                                <input type="text" name="street" class="form-control" placeholder="Gatvė" />
                                @if ($errors->has('street'))
                                    <span class="text-danger">{{ $errors->first('street') }}</span>
                                @endif
                            </div>
                    		<div class="form-group mb-3">
                    			<input type="text" name="h_number" class="form-control" placeholder="Namo nr." />
                                @if ($errors->has('h_number'))
                                <span class="text-danger">{{ $errors->first('h_number') }}</span>
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
