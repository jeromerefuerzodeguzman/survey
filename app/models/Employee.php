<?php

class Employee extends Eloquent {

	public static $unguarded = true;
	

	public static function validate($data) {
		$rules = array(
			'fname' => 'required|min:2',
			'lname' => 'required|min:2'
		);

		return Validator::make($data,$rules);
	}

	public static function validate_search($data) {
		$rules = array(
			'keyword' => 'required',
			'category' => 'required'
		);

		return Validator::make($data,$rules);
	}

	public static function add($data) {
		//creates a unique code for the link
		$code =preg_replace('/\s+/', '' ,substr($data['fname'], 0, 2) . date("mdy") . substr($data['lname'], 0, 2) . date("His"));

		$employee = Employee::create(array(
			'fname' => $data['fname'],
			'lname' => $data['lname'],
			'code' => $code
			));

		$employee_set = Employeeset::add($employee->id);

		return $code;
	}
}