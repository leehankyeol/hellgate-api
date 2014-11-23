<?php

class VoteLogsController extends \BaseController {

	public function postStore() {
		$user_id = Session::has("user_id")? Session::get("user_id"): 1;
		$relationship_id = Input::get("relationship_id");
		$type = Input::get("type");

		$relationship = Relationship::find($relationship_id);

		$voteLog = VoteLog::where("user_id", '=', $user_id)->where("relationship_id", '=', $relationship->id)->get()->first();
		if (!is_null($voteLog)) {
			return $this->returnJson(null, false, 'vote log exists');
		}

		if ($type == -1) {
			$relationship = Relationship::where("student1_id", '=', $relationship->student1_id)->where("student2_id", '=', $relationship->student2_id)->get()->first();
			$relationship->tot_downvote = $relationship->tot_downvote + 1;
			$relationship->save();

			$voteLog = new VoteLog;
			$voteLog->user_id = $user_id;
			$voteLog->relationship_id = $relationship->id;
			$voteLog->type = $type;
			$voteLog->save();

			$relationship = Relationship::where("student2_id", '=', $relationship->student1_id)->where("student1_id", '=', $relationship->student2_id)->get()->first();
			$relationship->tot_downvote = $relationship->tot_downvote + 1;
			$relationship->save();

			$voteLog = new VoteLog;
			$voteLog->user_id = $user_id;
			$voteLog->relationship_id = $relationship->id;
			$voteLog->type = $type;
			$voteLog->save();
		} else {
			$relationship = Relationship::where("student1_id", '=', $relationship->student1_id)->where("student2_id", '=', $relationship->student2_id)->get()->first();
			$relationship->tot_upvote = $relationship->tot_upvote + 1;
			$relationship->save();

			$voteLog = new VoteLog;
			$voteLog->user_id = $user_id;
			$voteLog->relationship_id = $relationship->id;
			$voteLog->type = $type;
			$voteLog->save();

			$relationship = Relationship::where("student2_id", '=', $relationship->student1_id)->where("student1_id", '=', $relationship->student2_id)->get()->first();
			$relationship->tot_upvote = $relationship->tot_upvote + 1;
			$relationship->save();

			$voteLog = new VoteLog;
			$voteLog->user_id = $user_id;
			$voteLog->relationship_id = $relationship->id;
			$voteLog->type = $type;
			$voteLog->save();
		}

		return $this->returnJson(null, true);
	}
}