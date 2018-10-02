<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Colour;
use App\Product;
use App\ProductCategory;
use App\ProductImages;
use App\Size;
use App\ProductSizes;
use App\ProductColours;
use App\Transporter;

class ProductsController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	
	public function messages()
	{
		return [
				'productname.required' => 'A title is required',
				'description.required'  => 'A message is required',
		];
	}
	public function __construct()
	{
		$this->middleware('auth');
	}
	// data validation
	protected function validator($request)
	{
		return $this->validate($request, [
				'productname' => 'required',
				'description' => 'required',
				'price'       => 'required',
				'quantity'    => 'required',
				'category'    => 'required',
				'pimage'	  => 'image|required|max:1999',
				'simage1'     => 'image|max:1999',
				'simage2'     => 'image|max:1999',
				'simage3'     => 'image|max:1999',
		]);
	}
	
    public function index()
    {
        $data = array(
        		'titel' => 'All Products',
        		// for the menu:
        		'categories' => ProductCategory::where('idParent',0)->get(),
        		'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
        		// for the index
        		'products' => Product::orderBy('created_at','desc')->paginate(12),
        		'images'   => ProductImages::all(),
        );
        return view('product.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
        		'titel' => 'New Product',
        		'categories' => ProductCategory::all(),
        		'sizes' => Size::all(),
        		'colours' => Colour::all(),
        		
        		// for the menu:
        		'categories' => ProductCategory::where('idParent',0)->get(),
        		'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
        		
        );
        
        return view('product.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	// validation
        $this->validator($request);
        
        
        $product = new Product();
        $product->productName = $request->input('productname');
        $product->mark = $request->input('mark');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->reduction = $request->input('reduction');
        $product->quantity = $request->input('quantity');
        $product->weight = $request->input('weight');
        $product->idCategory = $request->input('category');
        $product->save();
        
        $id = DB::getPdo()->lastInsertId();
        
        $this->storeImage($request,$id);
        $this->storeSize($request, $id);
        $this->storeColour($request, $id);
     
        	
        return redirect('/products')->with('success','Product created');
    }
    
    

    
    public function show($id)
    {
    	
    	$data =array(
    			'titel'   => 'Product Details',
    			'product' => Product::find($id),
    			'psizes'  => ProductSizes::where('productCode','=',Product::find($id)->productCode)->get(),
    			'sizes'   => Size::all(),
    			'pcolours' => ProductColours::where('productCode','=',Product::find($id)->productCode)->get(),
    			'colours' => Colour::all(),
    			'pimage'  =>  ProductImages::where([['productCode',Product::find($id)->productCode],['class','primary']])->get(),
    			'simage1'  => ProductImages::where([['productCode',Product::find($id)->productCode],['class','secondary1']])->get(),
    			'simage2'  => ProductImages::where([['productCode',Product::find($id)->productCode],['class','secondary2']])->get(),
    			'simage3'  => ProductImages::where([['productCode',Product::find($id)->productCode],['class','secondary3']])->get(),
    	
    			// for the menu:
    			'categories' => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    	);
        return view('product.details')->with('data',$data);
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
    			'titel' => 'Edit Product',
    			'product' => Product::find($id),
    			'category'   => ProductCategory::find(Product::find($id)->idCategory),
    			'sizes' => Size::all(),
    			'colours' => Colour::all(),
				'transporters' => Transporter::all(),
    			// for the menu:
    			'categories' => ProductCategory::where('idParent',0)->get(),
    			'subcategories' => ProductCategory::where('idParent','!=',0)->get(),
    	);
    	
    	return view('product.edit')->with('data',$data);
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
    			'productname' => 'required',
    			'description' => 'required',
    			'price'       => 'required',
    			'quantity'    => 'required',
    			'category'    => 'required',
    			'pimage'     => 'image|max:1999',
    			'simage1'     => 'image|max:1999',
    			'simage2'     => 'image|max:1999',
    			'simage3'     => 'image|max:1999',
    	]);
    	
    	
    	$product = Product::find($id);
    	$product->productName = $request->input('productname');
    	$product->mark = $request->input('mark');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->reduction = $request->input('reduction');
    	$product->quantity = $request->input('quantity');
    	$product->weight = $request->input('weight');
    	$product->idCategory = $request->input('category');
    	$product->save();
    	
    	
    	
    	$this->updateImage($request,$id);
    	$this->updateSize($request, $id);
    	$this->updateColour($request, $id);
    	
    	return redirect('/products')->with('success','Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	$product = Product::find($id);
    	
    	$product->delete();
    	
    	return redirect('/products')->with('success','Product Removed ');
    }
    
    public function storeImage(Request $request,$id=0)
    {
    	
    	// Handle File Upload:
    	if($request->hasFile('pimage'))
    	{
    		// Get the file from the request
    		$file = $request->file('pimage');
    		
    		// Get the contents of the file
    		$contents = $file->openFile()->fread($file->getSize());
    		// Get ext
    		$extension = $request->file('pimage')->getClientOriginalExtension();
    		
    		
    		// save primary image
    		$image = new ProductImages();
    		$image->image = $contents;
    		$image->productCode =$id;
    		$image->type = $extension;
    		$image->class = 'primary';
    		$image->save();
    	}
    	
    	
    	
    	// save secondary image 1:
    	// Handle File Upload:
    	if($request->hasFile('simage1'))
    	{
    		// Get the file from the request
    		$file = $request->file('simage1');
    		// Get the contents of the file
    		$contents = $file->openFile()->fread($file->getSize());
    		// Get ext
    		$extension = $request->file('simage1')->getClientOriginalExtension();
    		
    		
    		$image = new ProductImages();
    		$image->image = $contents;
    		$image->productCode =$id;
    		$image->type = $extension;
    		$image->class = 'secondary1';
    		$image->save();
    		
    	}
    	// save secondary image 2:
    	// Handle File Upload:
    	if($request->hasFile('simage2'))
    	{
    		// Get the file from the request
    		$file = $request->file('simage2');
    		// Get the contents of the file
    		$contents = $file->openFile()->fread($file->getSize());
    		// Get ext
    		$extension = $request->file('simage2')->getClientOriginalExtension();
    		
    		
    		$image = new ProductImages();
    		$image->image = $contents;
    		$image->productCode =$id;
    		$image->type = $extension;
    		$image->class = 'secondary2';
    		$image->save();
    		
    	}
    	// save secondary image 3:
    	// Handle File Upload:
    	if($request->hasFile('simage3'))
    	{
    		// Get the file from the request
    		$file = $request->file('simage3');
    		// Get the contents of the file
    		$contents = $file->openFile()->fread($file->getSize());
    		// Get ext
    		$extension = $request->file('simage3')->getClientOriginalExtension();
    		
    		
    		$image = new ProductImages();
    		$image->image = $contents;
    		$image->productCode =$id;
    		$image->type = $extension;
    		$image->class = 'secondary3';
    		$image->save();
    		
    	}
    	
    	
    }
    
    public function storeSize(Request $request,$id)
    {
    	if($request->has('sizes'))
    	{
    		$sizes=array();
    		$sizes = $request->input('sizes');
    		foreach ($sizes as $size)
    		{
    			if($size != 1)
    			{
    				
    				$s = new ProductSizes();
    				$s->productCode = $id;
    				$s->idSize = $size;
    				$str = 'q'.$size;
    				$s->quantity = $request->input($str);
    				$s->save();
    			}
    		}
    	}
    }
    
    public function storeColour(Request $request,$id)
    {
    	if($request->has('colours'))
    	{
    		$colours=array();
    		$colours = $request->input('colours');
    		foreach ($colours as $colour)
    		{
    			if($colour!= 1)
    			{
    				
    				
    				$s = new ProductColours();
    				$s->productCode = $id;
    				$s->idColour = $colour;
    				$str = 'q'.$colour;
    				$s->quantity = $request->input($str);
    				$s->save();
    			}
    		}
    	}
    }
    
 
    
    // updating:
    public function updateImage(Request $request,$id=0)
    {
    	
    	// Handle File Upload:
    	if($request->hasFile('pimage'))
    	{
    		// Get the file from the request
    		$file = $request->file('pimage');
    		
    		// Get the contents of the file
    		$contents = $file->openFile()->fread($file->getSize());
    		// Get extension
    		$extension = $request->file('pimage')->getClientOriginalExtension();
    		
    		
    		// update primary image
    		$product = Product::find($id);
    		$image = ProductImages::where([ ['productCode',$product->productCode],['class','primary'] ])->get();
    		foreach ($image as $i){
    		$i->image = $contents;
    		$i->type = $extension;
    		$i->save();
    		}
    	}
    	
    	
    	
    	// update secondary image 1:
    	// Handle File Upload:
    	if($request->hasFile('simage1'))
    	{
    		// Get the file from the request
    		$file = $request->file('simage1');
    		// Get the contents of the file
    		$contents = $file->openFile()->fread($file->getSize());
    		// Get extension
    		$extension = $request->file('simage1')->getClientOriginalExtension();
    		
    		$product = Product::find($id);
    		$image = ProductImages::where([ ['productCode',$product->productCode],['class','secondary1'] ])->get();
    		if(count($image)>0)
    		{
    			foreach ($image as $i){
    				$i->image = $contents;
    				$i->type = $extension;
    				$i->save();
    			}
    		}
    		else{
    		$image = new ProductImages();
    		$image->image = $contents;
    		$image->productCode =$id;
    		$image->type = $extension;
    		$image->class = 'secondary1';
    		$image->save();
    		}
    		
    	}
    	// save secondary image 2:
    	// Handle File Upload:
    	if($request->hasFile('simage2'))
    	{
    		// Get the file from the request
    		$file = $request->file('simage2');
    		// Get the contents of the file
    		$contents = $file->openFile()->fread($file->getSize());
    		// Get ext
    		$extension = $request->file('simage2')->getClientOriginalExtension();
    		
    		$product = Product::find($id);
    		$image = ProductImages::where([ ['productCode',$product->productCode],['class','secondary2'] ])->get();
    		if(count($image)>0)
    		{
    			foreach ($image as $i){
    				$i->image = $contents;
    				$i->type = $extension;
    				$i->save();
    			}
    		}
    		else{
    		$image = new ProductImages();
    		$image->image = $contents;
    		$image->productCode =$id;
    		$image->type = $extension;
    		$image->class = 'secondary2';
    		$image->save();
    		}
    		
    	}
    	// save secondary image 3:
    	// Handle File Upload:
    	if($request->hasFile('simage3'))
    	{
    		// Get the file from the request
    		$file = $request->file('simage3');
    		// Get the contents of the file
    		$contents = $file->openFile()->fread($file->getSize());
    		// Get ext
    		$extension = $request->file('simage3')->getClientOriginalExtension();
    		
    		$product = Product::find($id);
    		$image = ProductImages::where([ ['productCode',$product->productCode],['class','secondary3'] ])->get();
    		if(count($image)>0)
    		{
    			foreach ($image as $i){
    				$i->image = $contents;
    				$i->type = $extension;
    				$i->save();
    			}
    		}
    		else{
    		$image = new ProductImages();
    		$image->image = $contents;
    		$image->productCode =$id;
    		$image->type = $extension;
    		$image->class = 'secondary3';
    		$image->save();
    		}
    		
    	}
    	
    	
    }
    
    public function updateSize(Request $request,$id)
    {
    	if($request->has('sizes'))
    	{
    		$sizes=array();
    		$sizes = $request->input('sizes');
    		foreach ($sizes as $size)
    		{
    			if($size != 1)
    			{
    				$product = Product::find($id);
    				$newsize = ProductSizes::where([ ['productCode',$product->productCode],['idSize',$size] ])->get();
    				if(count($newsize) == 0){
    				 $s = new ProductSizes();
    				 $s->productCode = $id;
    				 $s->idSize = $size;
    				 $s->save();
    				}
    			}
    		}
    	}
    }
    
    public function updateColour(Request $request,$id)
    {
    	if($request->has('colours'))
    	{
    		$colours=array();
    		$colours = $request->input('colours');
    		foreach ($colours as $colour)
    		{
    			if($colour!= 1)
    			{
    				$product = Product::find($id);
    				$newcolour = ProductSizes::where([ ['productCode',$product->productCode],['idSize',$size] ])->get();
    				if(count($newcolour) == 0){
    				 $s = new ProductColours();
    				 $s->productCode = $id;
    				 $s->idColour = $colour;
    				 $s->save();
    				}
    			}
    		}
    	}
    }
    
   
    
}
