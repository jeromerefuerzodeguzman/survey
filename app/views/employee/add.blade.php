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
						Employee
						<span>Form</span>
					</h1>
					<div class="separator"></div>
				</div>
			</div>
			{{ Form::open(array('url' => 'employee_add')) }}
			<div class="row" style="margin-top: 30px">
				<div class="large-7 large-offset-1 columns">
					{{ Form::label('fname', 'First Name:') }}
					{{ Form::text('fname', Input::old('fname'), array('placeholder' => 'Enter your First Name here')) }}

					{{ Form::label('lname', 'Last Name:') }}
					{{ Form::text('lname', Input::old('lname'), array('placeholder' => 'Enter your Last Name here')) }}
					<br/>
					@if (Session::has('flash_error'))
					<small class="error">{{ Session::get('flash_error') }}</small>
					@endif
					{{ Form::submit('Add', array('class' => 'button radius')) }}
				</div>
			</div>
			{{ Form::token() }}
			{{ Form::close(); }}
		</div>
	</div>
@endsection


@section('scripts')
	
@endsection