@extends('frontend.layouts.app')

@section('content')
	<div class="container">
		
    <div class="row">
		@include('frontend.slsmark.includes.nav')
			<div class="column-md-12">
					<h1>Delivery Advice</h1>
			</div>
			
			<div class="col-md-8 form-inline" ;">
				<div class="input-daterange input-group" id="datepicker">
						<input type="date" class="input-sm form-control" name="dstart" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" />
						<span class="input-group-addon">to</span>
						<input type="date" class="input-sm form-control" name="dend" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"/>
				</div>
			</div>
			
			<button type="button" id="dateSearch" class="btn btn-sm btn-primary">Search</button>
			
			{!! Form::open(array('route' => ('frontend.slsmark.daselect2'), 'method' => 'POST')) !!}
			<table class="table" id="table1">
				
				<thead>
					<tr>
						<th>Item Number</th>
						<th>Customer PO</th>
						<th>Due Date</th>
						<th>Quantity</th>
						<th>Print</th>
						
					</tr>
				</thead>
				
			</table>
			<button type="submit" class="btn btn-success " value="Submit"> Print </button>
			{!! Form::close() !!}
       
    </div>
	</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.18/b-1.5.2/b-colvis-1.5.1/b-html5-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/r-2.2.2/rg-1.0.3/sc-1.5.0/datatables.min.css"/>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css"/>
 
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/b-1.5.2/b-colvis-1.5.1/b-html5-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/r-2.2.2/rg-1.0.3/sc-1.5.0/datatables.min.js"></script>
	
	<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
	

	<script>				
				$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
				});
        $(function () {
					var table = $('#table1').DataTable({
						processing: true,
						serverSide: true,
						rowGroup: {
							dataSrc: 2
						},
						 select: {
            style: 'multi'
        },
						fixedHeader: true,
						autoWidth: true,
						pageLength: 100,
						fixedHeader: true,
						colReorder: true,
						ajax: {
							url: '{{ route("frontend.slsmark.da_table") }}',
							type: "POST",
							data: function (d) {
								d.dstart = $('input[name=dstart]').val();
								d.dend = $('input[name=dend]').val();
									 
							},
						},
						
					});
					$('#dateSearch').on('click', function(){ table.draw();});
        });
				
				
	</script>

@endsection