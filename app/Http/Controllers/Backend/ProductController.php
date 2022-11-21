<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use App\Models\Backend\Supplier;
use App\Models\Backend\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', 1)->get();
        return view('backend.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
        $data['suppliers'] = Supplier::all();
        return view('backend.pages.product.create-edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255',
            'supplier_id' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
            "image" => "required|image|mimes:jpg,png,jpeg,gif",

        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->category_id = $request->category_id;
        $product->created_by = Auth::user()->id;
        // Photo
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/uploads/product'), $filename);
            $product->image = $filename;
        }
        $product->save();

        return redirect()->back()->with('success', 'Data Save success!');
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
        $data['editData'] = Product::find($id);
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
        $data['suppliers'] = Supplier::all();
        return view('backend.pages.product.create-edit', $data);
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
        $request->validate([
            "image" => "nullable|image|mimes:jpg,png,jpeg,gif",

        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->category_id = $request->category_id;
        $product->created_by = Auth::user()->id;
        // Photo
        if ($request->file('image')) {
            $image_path = public_path() . '/storage/uploads/product/' . $product->image;
            if (@$product->image) {
                unlink($image_path);
            }
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/uploads/product'), $filename);
            $product->image = $filename;
        } else {
            unset($product->image);
        }

        $product->update();

        return redirect()->back()->with('success', 'Data Update success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $image_path = public_path() . '/storage/uploads/product/' . $data->image;
        if (file_exists($image_path))
            unlink($image_path);
        $data->delete();

        return redirect()->back()->with('success', 'Data Deleted success!');
    }
}
