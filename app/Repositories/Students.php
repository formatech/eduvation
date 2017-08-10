<?php

namespace App\Repositories;

use App\Student;

class Students {
		
    public function __construct () {
       
    }
	
	function all() {
		return Student::with(['subscriptions' => function ($q) {

			// select id, name from subscriptions where student_id in (1, 2, 3)
			return $q->select(['id', 'name', 'student_id'])->orderBy('created_at', 'desc')
			->limit(5);
		}])->get();
	}
	
	function find($id) {
		return Student::where('id', $id)->first();
	}
	
	function delete($id) {
		return Student::where('id', $id)->delete();
	}
	
	function create($data) {

		// $student = new Student();
		// $student->name = $data['name'];
		// $student->family_name = $data['family_name'];
		// $student->grade = $data['grade'];

		// $student->save();

		Student::create($data);
	}
	
}
