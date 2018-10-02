<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
	// Table Name:
	protected $table='sizes';
	// Primary Key:
	public $primaryKey ='idSize';
	//Timestamps:
	public $timestamps =true;
}
