@extends('dashboard')
@section('head')

@section('content')

    <h2 class="mt-3">Ligų informacija</h2>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Pridėti naują ligą</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('illnesses.add_illness') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label><b>Ligos pavadinimas</b></label>
                            <input type="text" name="name" class="form-control"/>
                            @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label><b>Ligos aprašymas</b></label>
                            <input type="text" name="description" class="form-control"/>
                            @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="submit" class="btn btn-primary" value="Pridėti"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
