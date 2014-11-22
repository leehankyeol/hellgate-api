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

	protected $fillable = array('user_id', 'student1_id', 'student2_id');

	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];

	public function user() {
		return $this->belongsTo('User');
	}

	public function student1() {
		return $this->belongsTo('Student');
	}

	public function student2() {
		return $this->belongsTo('Student');
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
