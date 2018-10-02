<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colour;
use App\ProductCategory;


class ColoursController extends Controller
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
        	'titel' => 'Colour',
        	'colours' => Colour::where('idColour','!=',1)->paginate(4),
        	'categories' => ProductCategory::where('idParent',0)->get(),
        	'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
        );
        return view('colour.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data =array(
    			'titel' => 'New Colour',
    			'categories' => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    	);
    	return view('/colour.create')->with('data',$data);
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
    			'colour' => 'required',
    	]);
    	
    	// Create Colour
    	$colour = new Colour();
    	$colour->colour = $request->input('colour');
    	$colour->save();
    	
    	return redirect('/colours')->with('success','Colour Created ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    			'titel' => 'Edit Colour',
    			'colour' => Colour::find($id),
    			'categories' => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    	);
    	return view('/colour.edit')->with('data',$data);
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
    			'colour' => 'required',
    	]);
    	
    	// update Colour
    	$colour = Colour::find($id);
    	$colour->colour = $request->input('colour');
    	$colour->save();
    	
    	return redirect('/colours')->with('success','Colour Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colour = Colour::find($id);
        $colour->delete();
        return redirect('/colours')->with('success','Colour Removed');
    }
}
