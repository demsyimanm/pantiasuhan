<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'id',
		'name',
		'graduationDate'
	);


	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
