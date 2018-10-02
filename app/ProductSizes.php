<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSizes extends Model
{
	// Table Name:
	protected $table='product_sizes';
	// Primary Key:
	public $primaryKey ='productCode';
	//Timestamps:
	public $timestamps =true;
}
