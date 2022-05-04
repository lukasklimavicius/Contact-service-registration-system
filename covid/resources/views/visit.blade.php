@extends('dashboard')

@section('content')

<h2 class="mt-3">Vizitai</h2>

<div class="mt-4 mb-4">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-8">Mano vizitai</div>
				<div class="col col-md-4"><a href="/visit/add" class="btn btn-success btn-sm float-end">Naujas</a></div>
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
$(document).ready(function(){

	var table = $('#visit_table').DataTable({
        responsive: true,
		processing:true,
		serverSide:true,
		ajax:"{{ route('visit.fetchall') }}",
		columns:[
            {
				data: 'time_from',
				name: 'time_from',
                width: "10%"
			},
			{
				data:'time_to',
				name:'time_to',
                width: "10%"
			},
			{
				data:'visited_company',
				name: 'visited_company',
                width: "40%"
			},
            {
                data:'action',
                name:'action',
                orderable:false,
                width: "30%"
            }
		]
	});

});
</script>

@endsection
