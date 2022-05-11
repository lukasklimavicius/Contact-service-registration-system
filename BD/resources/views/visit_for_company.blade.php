@extends('dashboard')

@section('content')

    <h2 class="mt-3">Vizitai</h2>

    <div class="mt-4 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="visit_table">
                            <thead>
                            <tr>
                                <th>Klientas</th>
                                <th>Vizito pradžia</th>
                                <th>Vizito pabaiga</th>
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

                $('#visit_table thead tr')
                    .clone(true)
                    .addClass('filters')
                    .appendTo('#visit_table thead');

                var table = $('#visit_table').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('visit.fetchall_company') }}",
                    columns: [
                        {
                            data: 'name',
                            name: 'name',
                            width: "5%"
                        },
                        {
                            data: 'time_from',
                            name: 'time_from',
                            width: "10%"
                        },
                        {
                            data: 'time_to',
                            name: 'time_to',
                            width: "10%"
                        }
                    ],
                    orderCellsTop: true,
                    fixedHeader: true,
                    initComplete: function () {
                        var api = this.api();

                        // For each column
                        api
                            .columns()
                            .eq(0)
                            .each(function (colIdx) {
                                // Set the header cell to contain the input element
                                var cell = $('.filters th').eq(
                                    $(api.column(colIdx).header()).index()
                                );
                                var title = $(cell).text();
                                $(cell).html('<input type="text" placeholder="' + title + '" />');

                                // On every keypress in this input
                                $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                    .off('keyup change')
                                    .on('keyup change', function (e) {
                                        e.stopPropagation();

                                        // Get the search value
                                        $(this).attr('title', $(this).val());
                                        var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                        var cursorPosition = this.selectionStart;
                                        // Search the column for that value
                                        api
                                            .column(colIdx)
                                            .search(
                                                this.value != ''
                                                    ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                    : '',
                                                this.value != '',
                                                this.value == ''
                                            )
                                            .draw();

                                        $(this)
                                            .focus()[0]
                                            .setSelectionRange(cursorPosition, cursorPosition);
                                    });
                            });
                    },
                });

            });

            $(
                function () {

                    $('#filter_to').click(function () {

                        var minToDate = document.getElementById("filter_from").value;
                        console.log(minToDate);
                        document.getElementById("filter_to").setAttribute("min", minToDate);
                    });

                });


        </script>

@endsection
