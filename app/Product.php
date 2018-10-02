<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	// Table Name:
	protected $table='products';
	// Primary Key:
	public $primaryKey ='productCode';
	//Timestamps:
	public $timestamps =true;
	
	public function category()
	{
		return $this->belongsTo('App\ProductCategory');
	}
}
