<?php

class BaseController extends Controller {

	public static $RELATIONSHIPS_PER_PAGE = 20;

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

		$response->data = $data;
		$response->success = $success;
		$response->error = $error;

		return Response::json($response);
	}

	public function calculateAvgStickiness($relationship, $stickiness) {
		return ($relationship->num_stickiness * $relationship->avg_stickiness + $stickiness) / ($relationship->num_stickiness + 1) ;
	}

}
