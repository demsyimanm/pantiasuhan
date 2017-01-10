<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'id',
		'name',
		'date',
		'description',
		'poster'
	);


	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
