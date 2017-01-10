<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';
	protected $primaryKey = 'id';
	public $timestamps = true;
	public $incrementing = true;

	protected $fillable = array(
		'id',
		'title',
		'link',
		'date',
	);


	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
