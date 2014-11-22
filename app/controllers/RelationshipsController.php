<?php

class RelationshipsController extends \BaseController {

	public function postGets($page = 1) {
		$relationships = Relationship::with(
			'student1', 'student2'
		)->skip(($page - 1) * parent::$RELATIONSHIPS_PER_PAGE)->take(parent::$RELATIONSHIPS_PER_PAGE)->get();

		return $this->returnJson($relationships, true);
	}

	public function postGetGraph() {
		$relationships = Relationship::get();
		$students = Student::get();

		$data = new stdClass();
		$data->students = $students;
		$data->relationships = $relationships;

		return $this->returnJson($data, true);	
	}

	public function postStore() {
		$student1_name = Input::get('name_1');
		$student1_sex = Input::get('sex_1');
		$student1_enter_year = Input::get('enter_year_1');
		$student1_major = Input::get('major_1');

		$student2_name = Input::get('name_2');
		$student2_sex = Input::get('sex_2');
		$student2_enter_year = Input::get('enter_year_2');
		$student2_major = Input::get('major_2');

		$status = Input::get('status');
		$stickiness = Input::get('stickiness');

		$student1 = Student::where("name", '=', $student1_name)->where("sex", '=', $student1_sex)->where("enter_year", '=', $student1_enter_year)->where("major", '=', $student1_major)->get()->first();

		if (is_null($student1)) {
			$student1 = new Student;
			$student1->name = $student1_name;
			$student1->sex = $student1_sex;
			$student1->enter_year = $student1_enter_year;
			$student1->major = $student1_major;
			$student1->save();
		}

		$student2 = Student::where("name", '=', $student2_name)->where("sex", '=', $student2_sex)->where("enter_year", '=', $student2_enter_year)->where("major", '=', $student2_major)->get()->first();

		if (is_null($student2)) {
			$student2 = new Student;
			$student2->name = $student2_name;
			$student2->sex = $student2_sex;
			$student2->enter_year = $student2_enter_year;
			$student2->major = $student2_major;
			$student2->save();
		}

		$relationship = Relationship::where("student1_id", '=', $student1->id)->where("student2_id", '=', $student2->id)->get()->first();

		if (is_null($relationship)) {
			$relationship = new Relationship;
			$relationship->user_id = Session::has("user_id")? Session::get("user_id"): 1;
			$relationship->student1_id = $student1->id;
			$relationship->student2_id = $student2->id;
			$relationship->status = intval($status);
			$relationship->num_stickiness = 1;
			$relationship->avg_stickiness = floatval($stickiness);
			$relationship->tot_upvote = 0;
			$relationship->tot_downvote = 0;
			$relationship->save();

			$relationship = new Relationship;
			$relationship->user_id = Session::has("user_id")? Session::get("user_id"): 1;
			$relationship->student1_id = $student2->id;
			$relationship->student2_id = $student1->id;
			$relationship->status = intval($status);
			$relationship->num_stickiness = 1;
			$relationship->avg_stickiness = floatval($stickiness);
			$relationship->tot_upvote = 0;
			$relationship->tot_downvote = 0;
			$relationship->save();
			
		} else {
			$relationship1 = Relationship::where("student1_id", '=', $student1->id)->where("student2_id", '=', $student2->id)->get()->first();
			$relationship1->avg_stickiness = $this->calculateAvgStickiness($relationship1, $stickiness);
			$relationship1->num_stickiness = $relationship1->num_stickiness;
			$relationship1->status = $status;
			$relationship1->save();
			$relationship2 = Relationship::where("student1_id", '=', $student2->id)->where("student2_id", '=', $student1->id)->get()->first();
			$relationship2->avg_stickiness = $this->calculateAvgStickiness($relationship2, $stickiness);
			$relationship2->num_stickiness = $relationship2->num_stickiness;
			$relationship2->status = $status;
			$relationship2->save();
		}

		return $this->returnJson(null, true);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
