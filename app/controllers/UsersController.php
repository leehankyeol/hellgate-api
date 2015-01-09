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

	public function getShow($id) {
		$user = User::find($id);

		View::share('user', $user);
		$this->layout = View::make('layout');
		$this->layout->content = View::make('users.show');
	}
}