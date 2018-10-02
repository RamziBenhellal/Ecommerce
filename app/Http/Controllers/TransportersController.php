<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transporter;
use App\ProductCategory;

class TransportersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$data = array(
    			'titel' => 'Transporters',
    			'transporters' => Transporter::all(),
    			// for the menu:
    			'categories' => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    	);
    	return view('transporter.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data =array(
    			'titel' => 'New Transporter',
    			// for the menu:
    			'categories' => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    	);
    	return view('/transporter.create')->with('data',$data);
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
    			'name' => 'required',
    			'avatar' => 'image|max:1999'
    			
    	]);
    	
    	if($request->hasFile('avatar'))
    	{
    		// Get the file from the request
    		$file = $request->file('avatar');
    		
    		// Get the contents of the file
    		$contents = $file->openFile()->fread($file->getSize());
    		
    	}
    	
    	// Create Transporter
    	$transporter = new Transporter();
    	$transporter->transporterName = $request->input('name');
    	if($request->hasFile('avatar'))
    	{
    		$transporter->avatar = $contents;
    	}
    	$transporter->save();
    	
    	return redirect('/transporters')->with('success','Transporter Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$data = array (
    			'titel' => 'Transporter Details',
    			'transporter' => Transporter::find($id),
    			 // For the menu:
    			'categories'    => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    	);
    	
    	return view('transporter.details')->with('data',$data);
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
    			'titel' => 'Edit Transporter',
    			'transporter' => Transporter::find($id),
    			// for the menu:
    			'categories' => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    	);
    	return view('/transporter.edit')->with('data',$data);
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
    			'name' => 'required',
    			'avatar' => 'image|max:1999'
    			
    	]);
    	
    	if($request->hasFile('avatar'))
    	{
    		// Get the file from the request
    		$file = $request->file('avatar');
    		
    		// Get the contents of the file
    		$contents = $file->openFile()->fread($file->getSize());
    		
    	}
    	
    	// Create Transporter
    	$transporter = Transporter::find($id);
    	$transporter->transporterName = $request->input('name');
    	if($request->hasFile('avatar'))
    	{
    		$transporter->avatar = $contents;
    	}
    	$transporter->save();
    	
    	return redirect('/transporters')->with('success','Transporter Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$transporter = Transporter::find($id);
    	$transporter->delete();
    	return redirect('/transporters')->with('success','Transporter Removed ');
    }
}
