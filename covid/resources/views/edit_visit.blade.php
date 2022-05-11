@extends('dashboard')
@section('head')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" defer></script>

@section('content')

    <h2 class="mt-3">Mano vizitas</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Redaguoti vizitą</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('visit_update') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label><b>Įmonė, kurioje lankėtės</b></label>
                                <select name="company" class="form-control operator" id="select_page">
                                    @foreach($visit as $key => $value)
                                        <option value="" selected hidden disabled>{{ $value->title }}</option>
                                    @endforeach
                                    @foreach ($companies as $company => $cvalue)
                                        <option value="{{ $cvalue->id }}">
                                            {{ $cvalue->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label><b>Vizito pradžia</b></label><br>

                                <input id="date_from" type="datetime-local" name="date_from"
                                       value="<?php echo date('Y-m-d\TH:i', strtotime($value->time_from)) ?>">

                                @if($errors->has('date_from'))
                                    <span class="text-danger">{{ $errors->has('date_from') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label><b>Vizito pabaiga</b></label><br>
                                <input id="date_to" type="datetime-local" name="date_to" min=""
                                       value="<?php echo date('Y-m-d\TH:i', strtotime($value->time_to)) ?>">
                                @if($errors->has('date_to'))
                                    <span class="text-danger">{{ $errors->has('date_to') }}</span>
                                @endif
                            </div>
                            @foreach($visit as $key => $value)
                                <input type="hidden" name="visit_id" value="{{ $value->id }}"/>
                            @endforeach


                            <div class="form-group mb-3">
                                <input type="submit" class="btn btn-primary" value="Pakeisti"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(
            function () {

                $('#date_to').click(function () {

                    var minToDate = document.getElementById("date_from").value;
                    console.log(minToDate);
                    document.getElementById("date_to").setAttribute("min", minToDate);
                });

            }
        );

        $(document).ready(function () {
            $("#select_page").select2();
        });

    </script>
@endsection
