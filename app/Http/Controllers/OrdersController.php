<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use App\Order;
use App\Client;
use App\ProductCategory;
use App\CartProduct;
use App\Product;
use App\ProductImages;
use App\Size;
use App\Colour;
use App\Transaction;




class OrdersController extends Controller
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
            'titel' => 'All Orders',
            // for the menu:
            'categories' => ProductCategory::where('idParent',0)->get(),
            'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
            // for the index
            'orders' => Order::orderBy('created_at','desc')->get()
    );
    return view('order.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            'titel' => 'Order Details',
            // for the menu:
            'categories'    => ProductCategory::where('idParent',0)->get(),
            'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
            // for the details : 
            'order'        =>  Order::find($id),
            'cartProducts' => CartProduct::where('idOrder',$id)->get(),
            'products'     => Product::all(),
            'images'       => ProductImages::where('class','primary')->get(),
            'sizes'        => Size::all(),
            'colours'      => Colour::all()
        );
        
        return view('order.details')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function treat($id)
    {
    	$data = array(
    			
    	     // for the menu:
    		'categories'    => ProductCategory::where('idParent',0)->get(),
    		'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    		'order'   => Order::find($id),
    		'client'  => Client::find(Order::find($id)->idClient),
    		'cartProducts' => CartProduct::where('idOrder',$id)->get(),
    		'products'     => Product::all(),
    		'images'       => ProductImages::where('class','primary')->get(),
    		'sizes'        => Size::all(),
   			'colours'      => Colour::all(),
    		'transaction' => Transaction::where('idOrder',Order::find($id)->idOrder)->get(),	
    	);
    	
    	$geoaddress = explode('/',Client::find(Order::find($id)->idClient)->geoAddress);
    	if($geoaddress[0] != NULL)
    		Mapper::map($geoaddress[0],$geoaddress[1],['zoom' => 15]);
    	$data['order']->status = 'In Process';
    	$data['order']->save();
    	return view('order.treat')->with('data',$data);
    }
}
