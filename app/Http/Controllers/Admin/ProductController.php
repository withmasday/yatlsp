<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Output\Theme;
use Throwable;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'avaiable' => 'required|boolean',
            'new' => 'required|boolean',
            'image.*' => 'required|mimes:jpg,jpeg,png,gif'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Invalid Post Data!');
        }

        try {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->avaiable = $request->avaiable;
            $product->new = $request->new;
            $product->save();

            if ($request->hasfile('image')) {
                foreach ($request->file('image') as $file) {
                    $filename = time() . rand(1, 100) . '.' . $file->extension();
                    $file->move(public_path('image'), $filename);
                    $attachment = new Attachment();
                    $attachment->product_id = $product->id;
                    $attachment->filename = $filename;
                    $attachment->save();
                }

                return redirect()->route('admin.product.index')->with('success', 'Add New Product Success!');
            }

            return redirect()->back()->with('info', 'Something Wrong!');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', '500 Internal Server Error!');
        }
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
