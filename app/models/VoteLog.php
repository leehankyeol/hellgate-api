<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class VoteLog extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'voteLogs';

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

	public function Relationship() {
		return $this->belongTo('Relationship');
	}
}
