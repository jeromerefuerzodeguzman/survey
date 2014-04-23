<?php

class QuestionController extends BaseController {

	public function index($code) {
		//search the employee from the code given
		$employee = Employee::where('code', '=', $code)->first();
		if($employee) {
			$employee_set = Employeeset::where('employee_id', '=', $employee->id)
								->where('status', '=', 'on')
								->first();
			if($employee_set) {
				$questions = Question::where('set_id', '=', $employee_set->set_id)->get();

				return View::make('question.list')
					->with('employee_set', $employee_set)
					->with('employee', $employee)
					->with('lists', $questions);

			} else {
				return View::make('question.error')
					->with('employee', $employee);
			}
		}
		

	}

}	