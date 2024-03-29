@extends('dashboard')
@section('content')

    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">

                    @if (session()->has('error'))

                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>

                    @endif

                    <div class="card">
                        <h3 class="card-header text-center">Prisijungimas</h3>

                        <div class="card-body">
                            <form method="post" action="{{ route('login.custom') }}">

                                @csrf

                                <div class="form-group mb-3">
                                    <input type="text" name="email" class="form-control" placeholder="El. paštas"/>

                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" name="password" class="form-control"
                                           placeholder="Slaptažodis"/>

                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Prisijungti</button>
                                </div>

                            </form>
                            <div class="text-center">
                                <p>Dar neužsiregistravote? <a href="{{ route('register-client') }}">Registruokitės
                                        čia</a></p>
                                <p>Esate įmonė? <a href="{{ route('register') }}">Registruokitės čia</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
