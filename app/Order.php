<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Table Name:
	protected $table='orders';
	// Primary Key:
	public $primaryKey ='idOrder';
	//Timestamps:
	public $timestamps =true;
}
