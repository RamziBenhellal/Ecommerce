<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
	// Table Name:
	protected $table='cartproducts';
	// Primary Key:
	public $primaryKey ='idChart';
	//Timestamps:
	public $timestamps =true;
}
