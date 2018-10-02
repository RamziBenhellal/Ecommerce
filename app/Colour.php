<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
	// Table Name:
	protected $table='colours';
	// Primary Key:
	public $primaryKey ='idColour';
	//Timestamps:
	public $timestamps =true;
}
