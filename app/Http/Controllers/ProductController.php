<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
 public function index(Request $request)
{
    $keyword = $request->keyword;

    $products = Product::where('name', 'LIKE', '%' . $keyword . '%')
        ->orderBy('id', 'desc')
        ->paginate(5);

    return view('products.index', compact('products', 'keyword'));
}

    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
	  $request->validate([
        'category_id' => 'required',
        'name'        => 'required',
        'price'       => 'required|numeric',
        'stock'       => 'required|integer',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $imageName = null;

    if ($request->hasFile('image')) {
        $imageName = $request->file('image')->store('products', 'public');
    }

    Product::create([
        'category_id' => $request->category_id,
        'name'        => $request->name,
        'description' => $request->description,
        'price'       => $request->price,
        'stock'       => $request->stock,
        'image'       => $imageName,
    ]);

    return redirect()->route('products.index')
        ->with('success', 'เพิ่มสินค้าเรียบร้อยแล้ว');
    }

    public function update(Request $request, $id)
    {
  $request->validate([
        'category_id' => 'required',
        'name'        => 'required',
        'price'       => 'required|numeric',
        'stock'       => 'required|integer',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $product = Product::findOrFail($id);

   $imageName = $product->image;

if ($request->hasFile('image')) {

    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }

    $imageName = $request->file('image')->store('products', 'public');
}

    $product->update([
        'category_id' => $request->category_id,
        'name'        => $request->name,
        'description' => $request->description,
        'price'       => $request->price,
        'stock'       => $request->stock,
        'image'       => $imageName,
    ]);

    return redirect()->route('products.index')
        ->with('success', 'แก้ไขสินค้าเรียบร้อยแล้ว');
	}
	
	public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();

    return view('products.edit', compact('product', 'categories'));
}

public function destroy($id)
{
    $product = Product::findOrFail($id);

    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }

    $product->delete();

    return redirect()->route('products.index')
        ->with('success', 'ลบสินค้าเรียบร้อยแล้ว');
}
}