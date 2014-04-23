<?php

class Employeeset extends Eloquent {

	public static $unguarded = true;
	
	public static function add($id) {
		$sets = Set::all();
		
		foreach ($sets as $set) {
			$employee_set = Employeeset::create(array(
					'set_id' => $set->id,
					'employee_id' => $id,
					'status' => 'off'
				));
		}
	}

	public function set() {
		return $this->belongsTo('Set', 'set_id');
	}


}