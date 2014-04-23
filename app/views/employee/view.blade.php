@extends('layouts.default')

@section('title')
	Employee List
@endsection


@section('content')
	<div class="row">
		<div class="large-11 columns">&nbsp;</div><div class="large-1 columns"><a href="{{ URL::to('employee/add'); }}" data-tooltip class="has-tip tip-right" title="Add New Employee"><i class="general foundicon-plus"></i></a></div>
	</div>
	<hr />
	<table class="large-12">
		<thead>
			<tr>
				<th class="large-3">Link</th>
				<th class="large-3">First Name</th>
				<th class="large-3">Last Name</th>
				<th class="large-3">Manage</th>
			</tr>
		</thead>
		<tbody>
			@foreach($lists as $employee)
			<tr>
				<td><h5><a href="{{ URL::to('code/' .  $employee->code ) }}">{{ $employee->code }}</a></h5></td>
				<td>{{ $employee->fname }}</td>
				<td>{{ $employee->lname }}</td>
				<td><a href="{{ URL::to('employee/manage/' . $employee->id ); }}" data-tooltip class="has-tip tip-right" title="Settings"><i class="general foundicon-settings"></i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection


@section('scripts')
	
@endsection