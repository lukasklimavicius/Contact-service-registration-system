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
                <div class="card-header">Ligos informacija</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('visit_mark') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label><b>Liga, kuria susirgote</b></label>
                                <select name="disease_id" class="form-control operator" id="select_page">
                                    @foreach ($diseases as $disease)
                                        <option value="{{ $disease->id }}">
                                            {{ $disease->illness_name }} {{$disease->illness_description}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                            <input type="hidden" name="visit_id" value="{{$visit_id}}"/>

                            <div class="form-group mb-3">
                                <input type="submit" class="btn btn-primary" value="Pranešti"/>
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
