<?php

class EmployeeController extends BaseController {

	public function index() {
		$list = Employee::all();
		return View::make('employee.view')
				->with('lists', $list);
	}

	public function employee_form() {
		return View::make('employee.add');
	}

	public function add() {
		$validation = Employee::validate(Input::all());

		if($validation->fails()) {
			$failed = $validation->failed();
			return  Redirect::to('employee/add')->with('error_index', $failed)->withErrors($validation)->withInput();
		} else {
			//add new employee
			$employee = Employee::add(Input::all());

			return Redirect::to('employee')
					->with('message', 'Succesfully Added');
		}
	}
	

	public function manage($id) {
		$sets = Employeeset::where('employee_id', '=', $id)->get();

		return View::make('employee.manage')
				->with('employee_id', $id)
				->with('sets', $sets);
	}

	public function manage_save() {
		$sets = Input::all();
		$id = $sets['employee_id'];

		unset($sets['employee_id']);
		unset($sets['_token']);

		//counts how many set is ON/OFF
		$count = array_count_values($sets);

		//checks if ONE set only is turned ON
		if(isset($count['on']) && $count['on'] > 1){
			return Redirect::to('employee/manage/' . $id)
					->with('error', 'Only 1 survey is allowed to ON');
		} else {
			foreach ($sets as $key => $value) {
				$employee_set = Employeeset::find(substr($key, 2));
				$employee_set->status = $value;
				$employee_set->save();
			//var_dump($employee_set);
			}

			return Redirect::to('employee/manage/' . $id)
					->with('message', 'Settings Saved');;
		}
		
	}

	public function search_form() {
		$category = array(
				'' => '',
				'fname' => 'First Name',
				'lname' => 'Last Name',
				'code' => 'Code'
			);

		return View::make('employee.search')
				->with('category', $category);
	}

	public function search() {
		$validation = Employee::validate_search(Input::all());

		if($validation->fails()) {
			$failed = $validation->failed();
			return  Redirect::to('search_form')->with('error_index', $failed)->withErrors($validation)->withInput();
		} else {
			//search for employees
			$list = Employee::where(Input::get('category'), 'LIKE', '%' . Input::get('keyword') . '%')->get();

			$category = array(
				'' => '',
				'fname' => 'First Name',
				'lname' => 'Last Name',
				'code' => 'Code'
			);

			return View::make('employee.search')
					->with('category_pick', Input::get('category'))
					->with('keyword_pick', Input::get('keyword'))
					->with('category', $category)
					->with('list', $list);
		}

	}

}	