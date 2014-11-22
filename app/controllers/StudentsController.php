<?php

class StudentsController extends \BaseController {

	public function postUpdate() {
		$name = Input::get('name');
		$sex = Input::get('sex');
		$enter_year = Input::get('enter_year');
		$major = Input::get('major');

		$user = User::find(Session::has("user_id")? Session::get("user_id"): 1);

		if ($user->point < 100) {
			return $this->returnJson(null, false, 'not enough point');
		}

		$student = Student::where("name", '=', $name)->where("sex", '=', $sex)->where("enter_year", '=', $enter_year)->where("major", '=', $major)->get()->first();

		if (is_null($student)) {
			return $this->returnJson(null, false, 'no student');
		}

		Relationship::where("student1_id", '=', $student->id)->delete();
		Relationship::where("student2_id", '=', $student->id)->delete();

		$user->point = $user->point - 100;
		$user->save();

		return Redirect::to('users/show/'.$user->id);
	}
}