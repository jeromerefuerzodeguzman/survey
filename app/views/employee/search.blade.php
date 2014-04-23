@extends('layouts.default')

@section('title')
	Search Employee
@endsection


@section('content')
	<div class="row">
		<div class="large-10 large-centered columns" id="login-content">
			<div class="row">
				<div class="large-12 columns">
					<h1>
						Employee
						<span>Search Form</span>
					</h1>
					<div class="separator"></div>
				</div>
			</div>
			{{ Form::open(array('url' => 'search')) }}
			<div class="row" style="margin-top: 30px">
				<div class="large-7 large-offset-1 columns">
					{{ Form::label('category', 'Category:') }}
					@if(isset($category_pick))
						{{ Form::select('category', $category, $category_pick) }}
					@else
						{{ Form::select('category', $category, Input::old('category')) }}
					@endif

					{{ Form::label('keyword', 'Keyword:') }}
					@if(isset($keyword_pick))
						{{ Form::text('keyword', $keyword_pick, array('placeholder' => 'K e y w o r d')) }}
					@else
						{{ Form::text('keyword', Input::old('keyword'), array('placeholder' => 'K e y w o r d')) }}
					@endif
					<br/>
					
					{{ Form::submit('Add', array('class' => 'button radius')) }}
				</div>
			</div>
			{{ Form::token() }}
			{{ Form::close(); }}
		</div>
	</div>
	@if(isset($list))
	<br />
	<br />
	<div class="row">
		<hr />
		<h5>RESULT</h5>
		<table class="large-12">
			<thead>
				<tr>
					<th class="large-3">Code</th>
					<th class="large-3">First Name</th>
					<th class="large-3">Last Name</th>
					<th class="large-3">Manage</th>
				</tr>
			</thead>
			<tbody>
				@foreach($list as $employee)
				<tr>
					<td><h5><a href="#">{{ $employee->code }}</a></h5></td>
					<td>{{ $employee->fname }}</td>
					<td>{{ $employee->lname }}</td>
					<td><a href="{{ URL::to('employee/manage/' . $employee->id ); }}" data-tooltip class="has-tip tip-right" title="Settings"><i class="general foundicon-settings"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endif
@endsection


@section('scripts')
	
@endsection