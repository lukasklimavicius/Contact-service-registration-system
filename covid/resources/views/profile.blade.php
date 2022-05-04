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

					@csrf

                    @if(Auth::user()->type == 'User')
                    <form method="post" action="{{ route('profile.edit_validation') }}">
                        <div class="form-group mb-3">
                            <label><b>Telefono nr.</b></label>
                            <input type="text" name="phone" class="form-control" value="{{ $data->phone }}" />
                            @if($errors->has('phone'))
                                <span class="text-danger">{{ $errors->has('phone') }}</span>
                            @endif

                        </div>
                        <div class="form-group mb-3">
                            <label><b>Slaptažodis</b></label>
                            <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                        <div class="form-group mb-3">
                            <input type="submit" class="btn btn-primary" value="Pakeisti" />
                        </div>
                    </form>

                    @elseif(Auth::user()->type == 'Company')
                        <div class="form-group mb-3">
                            <label><b>User Name</b></label>
                            <input type="text" name="name" class="form-control" placeholder="name" value="{{ $data->name }}" />
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label><b>Password</b></label>
                            <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                    @else

                    @endif



			</div>
		</div>
	</div>
</div>
@endsection
