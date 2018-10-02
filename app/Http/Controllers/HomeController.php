<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\Product;
use App\ProductImages;



class HomeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		$data =array('titel' => 'Home',
				'categories' => ProductCategory::where('idParent',0)->get(),
				'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
		);
		return view('home.index')->with('data',$data);
	}
	
	public function category($id)
	{
		$data =array('titel' => ProductCategory::find($id)->name,
				'categories' => ProductCategory::where('idParent',0)->get(),
				'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
				'products' => Product::where('idCategory',ProductCategory::find($id)->idCategory)->get(),
				//->orWhere('idCategory',ProductCategory::where('idParent',$id)->get()[0]->idCategory)
				'images'   => ProductImages::all(),
		);
		return view('product.index')->with('data',$data);
	}
	
	
	
}
