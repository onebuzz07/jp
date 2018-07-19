@extends('frontend.layouts.app')

@section('content')
<div>
	<h1>Manual SO Upload</h1>

	<h2>Warning! uploaded files contains data duplicating existing data</h2>
	<table class="table">
		<thead>
			<tr>
				
				<th>Part No</th>
				<th>Due Date</th>
				<th>Previously Uploaded Date</th>
			</tr>
			<tbody>
				
				@foreach($duplicates as $d)
					<tr> 
						 
						<td>{!!$d->part_no!!}</td>
						<td>{!!$d->duedate!!}</td>
						<td>{!!$d->created_at!!}</td>
					   
					</tr>
					
					
				@endforeach
				
				
			</tbody>
		</thead>
	</table>
</div>

<div>
	
	<a href="{{route('frontend.slsmark.index')}}" class="btn btn-info" role="button">Acknowledge</a>
</div>


@endsection

