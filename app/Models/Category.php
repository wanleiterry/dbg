<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	
	protected $table = 'category';
	
	protected $guarded = ['id'];
	
	public $timestamps = true;
	
}