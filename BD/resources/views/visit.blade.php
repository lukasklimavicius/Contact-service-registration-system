@extends('dashboard')


@section('content')

    <h2 class="mt-3">Vizitai</h2>

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

                    <div class="col col-md-4"><a href="/visit/add" class="btn btn-success btn-sm float-end">Naujas vizitas</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="visit_table">
                            <thead>
                            <tr>
                                <th>Įmonė</th>
                                <th>Vizito pradžia</th>
                                <th>Vizito pabaiga</th>
                                <th>Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {

                var table = $('#visit_table').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('visit.fetchall') }}",
                    columns: [
                        {
                            data: 'title',
                            name: 'title',
                            width: "5%"
                        },
                        {
                            data: 'time_from',
                            name: 'time_from',
                            width: "5%"
                        },
                        {
                            data: 'time_to',
                            name: 'time_to',
                            width: "5%"
                        },

                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            width: "30%"
                        }
                    ]
                });

                $(document).on('click', '.delete', function () {

                    var id = $(this).data('id');

                    if (confirm("Ar tikrai norite pašalinti vizitą?")) {
                        window.location.href = '/visit/delete/' + id;
                    }

                });

            });
        </script>

@endsection
