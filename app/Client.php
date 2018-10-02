<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	// Table Name:
	protected $table='clients';
	// Primary Key:
	public $primaryKey ='idClient';
	//Timestamps:
	public $timestamps =true;
}
