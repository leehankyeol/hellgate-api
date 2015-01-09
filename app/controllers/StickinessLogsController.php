<?php

class StickinessLogsController extends \BaseController {

	public function postStore() {
		$user_id = Session::has("user_id")? Session::get("user_id"): 1;
		$student1_id = Input::get("student1_id");
		$student2_id = Input::get("student2_id");
		$point = Input::get("point");

		$relationship = Relationship::where("student1_id", '=', $student1_id)->where("student2_id", '=', $student2_id)->get()->first();

		$stickinessLog = StickinessLog::where("user_id", '=', $user_id)->where("relationship_id", '=', $relationship->id)->get()->first();
		if (!is_null($stickinessLog)) {
			return $this->returnJson(null, false, 'stickiness log exists');
		}

		$relationship = Relationship::where("student1_id", '=', $student1_id)->where("student2_id", '=', $student2_id)->get()->first();
		$relationship->num_stickiness = $relationship->num_stickiness + 1;
		$relationship->avg_stickiness = $this->calculateAvgStickiness($relationship, $point);
		$relationship->save();

		$stickinessLog = new StickinessLog;
		$stickinessLog->user_id = $user_id;
		$stickinessLog->relationship_id = $relationship->id;
		$stickinessLog->point = $point;
		$stickinessLog->save();

		$relationship = Relationship::where("student2_id", '=', $student1_id)->where("student1_id", '=', $student2_id)->get()->first();
		$relationship->num_stickiness = $relationship->num_stickiness + 1;
		$relationship->avg_stickiness = $this->calculateAvgStickiness($relationship, $point);
		$relationship->save();

		$stickinessLog = new StickinessLog;
		$stickinessLog->user_id = $user_id;
		$stickinessLog->relationship_id = $relationship->id;
		$stickinessLog->point = $point;
		$stickinessLog->save();

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
