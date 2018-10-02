<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporter extends Model
{
	// Table Name:
	protected $table='transporters';
	// Primary Key:
	public $primaryKey ='idTransporter';
	//Timestamps:
	public $timestamps =true;
}
