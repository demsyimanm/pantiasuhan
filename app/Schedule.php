<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'id',
		'title',
		'start',
		'end',
		'description'
	);


	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
