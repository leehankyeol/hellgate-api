<?php

class UsersController extends \BaseController {

	public function postAuthenticate() {
		$device_id = Input::get("device_id");
		$user = User::where("device_id", '=', $device_id)->get()->first();

		if (is_null($device_id)) {
			return $this->returnJson(null, false, "no device id");
		}

		if (is_null($user)) {
			$user = new User;
			$user->device_id = $device_id;
			$user->save();

		}
		
		Session::put('user_id', $user->id);
		return $this->returnJson($user, true);
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
