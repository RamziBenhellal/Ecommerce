<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;
use App\ProductCategory;


class SizesController extends Controller
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
    			'titel' => 'Sizes',
    			'sizes' => Size::where('idSize','!=',1)->paginate(4),
    			// for the menu:
    			'categories' => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    	);
        return view('size.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data =array(
    			'titel' => 'New Size',
    			// for the menu:
    			'categories' => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    	);
    	return view('/size.create')->with('data',$data);
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
    			'size' => 'required',
    			'sign' => 'required',
    			
    	]);
    	
    	// Create Size
    	$size = new Size();
    	$size->size = $request->input('size');
    	$size->sign = $request->input('sign');
    	$size->save();
    	
    	return redirect('/sizes')->with('success','Size Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
        		'titel' => 'Edit Size',
        		'size' => Size::find($id),
        		// for the menu:
        		'categories' => ProductCategory::where('idParent',0)->get(),
        		'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
        );
        return view('/size.edit')->with('data',$data);
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
        	'size' => 'required',
        	'sign' => 'required',	
        ]);
        
        $size = Size::find($id);
        $size->size = $request->input('size');
        $size->sign = $request->input('sign');
        $size->save();
        
        return redirect('/sezes')->with('success','Size Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$size = Size::find($id);
    	$size->delete();
    	return redirect('/sizes')->with('success','Size Removed ');
    }
}
