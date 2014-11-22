<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Student extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'students';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];

	public function relationships() {
		return $this->hasMany('Relationship');
	}
}
