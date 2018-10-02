<?php

namespace App\Http\Controllers;
use App\User;
use App\ProductCategory;
use Illuminate\Foundation\Auth\ResetsPasswords;




class UsersController extends Controller
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
		$data = array(
				'titel' => 'Users',
				'users' => User::where('type','!=','client')->get(),
				// for the menu:
				'categories' => ProductCategory::where('idParent',0)->get(),
				'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
		);
		return view('user.index')->with('data',$data);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$data = array(
				'titel' => 'User Details',
				'user' => User::find($id),
				// for the menu:
				'categories' => ProductCategory::where('idParent',0)->get(),
				'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
		);
		return view('user.details')->with('data',$data);
		
	}
	
	use ResetsPasswords;
	
	public function edit($id)
	{
		$data = array(
				'titel' => 'Edit User',
				'user' => User::find($id),
				// for the menu:
				'categories' => ProductCategory::where('idParent',0)->get(),
				'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
		);
		return view('user.edit')->with('data',$data);
	}
	
	
	
}
