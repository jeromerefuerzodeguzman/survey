@extends('layouts.default')

@section('title')
	Employee Add
@endsection


@section('content')
	<div class="row">
		<div class="large-10 large-centered columns" id="login-content">
			<div class="row">
				<div class="large-12 columns">
					<h1>
						Manage
						<span>Exam Status</span>
					</h1>
					<div class="separator"></div>
				</div>
			</div>
			{{ Form::open(array('url' => 'employee/manage/save')) }}
			{{ Form::hidden('employee_id', $employee_id) }}
			<div class="row" style="margin-top: 30px">
				<div class="large-10 large-offset-1 columns">
					<table class="large-12" id="status_table">
					@foreach($sets as $set)
						<tr>
							<td class="large-3"><span class="radius secondary label">{{ $set->set->description }} :</span></td>
							<td class="large-10">
								<div class="switch">
									<input  name="id{{ $set-> id}}" type="radio" value="off" <?php if($set->status == 'off') echo 'checked'; ?> ></a>
									<label onclick="">Off</label>

									<input name="id{{ $set->id }}" type="radio" value="on" <?php if($set->status == 'on') echo 'checked'; ?>>
									<label onclick="">On</label>
									<span></span>
								</div>
							</td>
						</tr>
					@endforeach
					</table>
					{{ Form::submit('SAVE', array('class' => 'button radius')) }}
				</div>
			</div>
			{{ Form::token() }}
			{{ Form::close(); }}
		</div>
	</div>
@endsection


@section('scripts')
	
@endsection