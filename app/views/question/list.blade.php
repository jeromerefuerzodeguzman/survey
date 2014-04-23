@extends('layouts.survey')

@section('employee')
	{{ $employee->lname }}, {{ $employee->fname }}
@endsection

@section('survey_name')
	{{ $employee_set->set->description }}
@endsection


@section('content')
	{{ Form::open(array('url' => 'survey/answer')) }}
	{{ Form::hidden('id', $employee_set->id) }}
	{{ Form::hidden('set_id', $employee_set->set_id) }}
	{{ Form::hidden('employee_id', $employee->id) }}
		<table class="large-12">
			<thead>
				<tr>
					<th class="large-1">Number</th>
					<th class="large-6">Questions</th>
					<th class="large-5">Answer</th>
				
				</tr>
			</thead>
			<tbody>
				<?php $ctr=1; ?>
				@foreach($lists as $question)
				<tr>
					<td>{{ $ctr }}</td>
					<td>{{ $question->description }}</td>
					<td>{{ Form::text('question'.$question->id) }}</td>
				</tr>
				<?php $ctr++; ?>
				@endforeach

			</tbody>
		</table>
	<div class="small-3 small-centered columns">
		{{ Form::submit('Submit', array('class' => 'button radius')) }}
	</div>
	{{ Form::token() }}
	{{ Form::close(); }}
@endsection


@section('scripts')
	
@endsection