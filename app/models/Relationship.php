<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Relationship extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'relationships';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];

	public function user() {
		return $this->belongTo('User');
	}

	public function stickinessLog() {
		return $this->hasMany('StickinessLog');
	}

	public function voteLog() {
		return $this->hasMany('VoteLog');
	}

	public function comment() {
		return $this->hasMany('Comment');
	}
}
