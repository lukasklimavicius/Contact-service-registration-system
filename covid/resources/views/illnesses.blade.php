@extends('dashboard')

@section('content')

    <h2 class="mt-3">Ligų informacija</h2>

    <div class="mt-4 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-8">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif</div>

                    <div class="col col-md-4"><a href="/illnesses/add"
                                                 class="btn btn-success btn-sm float-end">Nauja</a></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Liga</th>
                                <th>Ligos aprašymas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (\App\Models\Illness::all() as $illness)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $illness->illness_name}}</td>
                                    <td>{{ $illness->illness_description}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>

            $(document).on('click', '.delete', function () {

                var id = $(this).data('id');

                if (confirm("Ar tikrai norite pašalinti vizitą?")) {
                    window.location.href = '/visit/delete/' + id;
                }

            });

            })
            ;
        </script>

@endsection
