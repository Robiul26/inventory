<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Purchase;
use App\Models\Backend\Supplier;
use App\Models\Backend\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['allData'] = Purchase::orderBy('id','DESC')->get();
        return view('backend.pages.purchase.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['suppliers'] = Supplier::all();
        $data['categories'] = Category::all();
        $data['suppliers'] = Supplier::all();
        return view('backend.pages.purchase.create-edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

        if ($request->category_id == null) {
            return redirect()->back()->with('error', 'Sorry! you do not select any item');
        } else {
            $count_category = count($request->category_id);
            for ($i = 0; $i < $count_category; $i++) {
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->status = 0;
                $purchase->created_by = Auth::user()->id;
                $purchase->save();
            }
        }

        return redirect()->back()->with('success', 'Data Saved successfully');
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
        $data['editData'] = Purchase::find($id);
        $data['suppliers'] = Supplier::all();
        $data['categories'] = Category::all();
        $data['suppliers'] = Supplier::all();
        return view('backend.pages.purchase.create-edit', $data);
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

        $purchase = Purchase::find($id);
        $purchase->supplier_id = $request->supplier_id;
        $purchase->unit_id = $request->unit_id;
        $purchase->category_id = $request->category_id;
        $purchase->created_by = Auth::user()->id;

        $purchase->update();

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
        $data = Purchase::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data Deleted success!');
    }
}
