<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
	
	protected $table = 'company';
	
	protected $guarded = ['id'];
	
	public $timestamps = true;

//	public function user()
//	{
//		return $this->hasOne('App\Models\User', 'id', 'user_id');
//	}
	
}