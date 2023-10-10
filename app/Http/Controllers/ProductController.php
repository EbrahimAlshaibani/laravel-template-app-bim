<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     function client () {
        $products = Product::all();
        $categories = Category::all();
        return view('products',compact('products','categories'));
     }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::with('category')->latest()->get();
            return DataTables::of($products)
                    ->addIndexColumn()
                    ->addColumn('category_name', function($row) {
                        return $row->category->display_name;
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                           $btn = $btn."<a href=".route('products.show',$row->id)." class='btn btn-sm btn-primary'>show</a>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.products.index');

        // $products = Product::all();
        // return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'number' =>'required|unique:products|min:5|max:5',
            'name' =>'required|max:50',
            'title' =>'required',
            'sub_name' =>'required',
            // 'image' =>'image',
        ]);
        $product =  Product::create([
            'sub_name'=>$request->sub_name,
            'name'=>$request->name,
            'title'=>$request->title,
            'category_id'=>$request->category,
            'detail'=>$request->detail,
        ]);
        if($request->file('images')){
            foreach ($request->file('images') as $key => $image) {
                $newFileName = time() ."$key .". $image->getClientOriginalExtension();
                $image->move(public_path('images'), $newFileName);
                Image::create([
                    'product_id' => $product->id,
                    'path'=>$newFileName
                ]);
            }
        }
       
        return redirect()->route('products.index')->with('success','Product was added successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
