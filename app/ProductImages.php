<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
	// Table Name:
	protected $table='product_images';
	// Primary Key:
	public $primaryKey ='idImage';
	//Timestamps:
	public $timestamps =true;
	
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
