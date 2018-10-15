<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('admin.products.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'image|required'
        ]);
        //upload image
        if($request->hasFile('image')){
            $image  = $request->image;
            $image->move('uploads',$image->getClientOriginalName());
        }
        //save the data to database
        Product::create([
            'name'=> $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image->getClientOriginalName()
        ]);
        //session message
        $request->session()->flash('msg','Your Product had been added');
        //redirect back
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.details',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit',compact('product'));
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
        //find the product
        $product = Product::findOrFail($id);
        //validate data
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);
        //check if any image
        if($request->hasFile('image')){
            //remove the old image
            if(file_exists(public_path('uploads/').$product->image)){
                unlink(public_path('uploads/').$product->image);
            }
            //upload the new image
            $image = $request->image;
            $image->move('uploads',$image->getClientOriginalName());
            $product->image = $request->image->getClientOriginalName();
        }
        //update the product
        $product->update([
            'name'=> $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image'=> $product->image
        ]);
        //session message
        $request->session()->flash('msg','Update Product done successfully');
        //redirect to products page
        return redirect('admin/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        session()->flash('msg','product had been removed successfully');
        return redirect()->back();
    }
}
