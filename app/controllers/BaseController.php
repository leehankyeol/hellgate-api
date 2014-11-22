<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function returnJson($data, $success, $error = null) {
		$response = new stdClass();

		$response->data = $object;
		$response->success = $success;
		$response->error = $error;

		return Response::json($response);
	}

}
