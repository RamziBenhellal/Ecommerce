<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
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
    	//$cat = ProductCategory::all()
    	//$cat = ProductCategory::orderBy('name','asc')->get();
    	//$cat = ProductCategory::where('name','kitchen')->get();
    	//$cat = DB::select('Select * from product_categories');
    	//$cat = ProductCategory::orderBy('name','asc')->take(1)->get();
    	//ProductCategory::orderBy('name','asc')->paginate(2);
    	$data = array(
    			'titel' => 'Product Categories',
    			'categories' => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get()
    	);
    	
        return view('productcategory.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data =array(
    			'titel' => 'New Category',
    			'categories' => ProductCategory::all(),
    			// for the menu:
    			'categories' => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    	);
        return view('/productcategory.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'categoryname' => 'required',	
    	]);
    	
    	// Create Product category
    	$category = new ProductCategory();
    	$category->name = $request->input('categoryname');
    	$category->idParent =(int) $request->input('parent');
    	$category->save();
    	
    	return redirect('/product_categories')->with('success','Category Created ');
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
    			'titel' => 'Product Categories',
    			'category' => ProductCategory::find($id),
    			// for the menu:
    			'categories' => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    	);
    	return ProductCategory::find($id);
    	return view('productcategory.index')->with('data',$data);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$data =array(
    			'titel' => 'Edit Category',
    			'categories' => ProductCategory::all(),
    			'category'   => ProductCategory::find($id),
    			'parent'     => ProductCategory::find(ProductCategory::find($id)->idParent),
    	);
    	return view('productcategory.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    			'categoryname' => 'required',
    	]);
    	
    	// Update Product category
    	$category = ProductCategory::find($id);
    	$category->name = $request->input('categoryname');
    	$category->idParent =(int) $request->input('parent');
    	$category->save();
    	
    	return redirect('/product_categories')->with('success','Category Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProductCategory::find($id);
        $category->delete();
        return redirect('/product_categories')->with('success','Category Removed ');
        
    }
}
