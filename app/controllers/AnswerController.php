<?php

class AnswerController extends BaseController {

	public function save() {
		var_dump(Input::all());

		$answers = Input::all();
		$employee_id = $answers['employee_id'];
		$set_id = $answers['set_id'];
		$id = $answers['id'];

		unset($answers['employee_id']);
		unset($answers['set_id']);
		unset($answers['id']);
		unset($answers['_token']);

		foreach ($answers as $key => $value) {
			$answer = Answer::create(array(
				'employee_id' => $employee_id,
				'set_id' => $set_id,
				'question_id' => substr($key, 8),
				'answer' => $value
				));
		}

		$employee_set = Employeeset::find($id);
		$employee_set->status = 'off';
		$employee_set->save();


		return Redirect::to('thankyou');
		
	}

	public function thankyou() {
		return View::make('question.thankyou');
	}

}	