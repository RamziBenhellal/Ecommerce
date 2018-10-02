<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
	// Table Name:
    protected $table='product_categories';
    // Primary Key:
    public $primaryKey ='idCategory';
    //Timestamps:
    public $timestamps =true;
    
    public function products()
    {
    	return $this->hasMany('App\Product');
    }
    
}
