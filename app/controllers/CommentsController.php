<?php

class CommentsController extends \BaseController {

	public function postStore() {
		$user_id = Session::has("user_id")? Session::get("user_id"): 1;
		$relationship_id = Input::get("relationship_id");
		$description = Input::get("description");

		$comment = new Comment;
		$comment->user_id = $user_id;
		$comment->relationship_id = $relationship_id;
		$comment->description = $description;
		$comment->save();

		return $this->returnJson(null, true);
	}
}