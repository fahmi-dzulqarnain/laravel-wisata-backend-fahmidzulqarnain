<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $products = Product::with('category')
            ->when($status, function ($query) use ($status) {
                $query->where('status', 'like', "%$status%");
            })
            ->orderBy('is_favorite', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'List of products',
            'data' => $products,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:archived,draft,published',
            'criteria' => 'required|string|in:perorangan,grup',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'is_favorite' => 'required|boolean',
            'stock' => 'required|numeric',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->criteria = $request->criteria;
        $product->description = $request->description;
        $product->is_favorite = $request->is_favorite;
        $product->stock = $request->stock;
        $product->save();

        if ($request->file('image')) {
            $image = $request->file('image');
            $image_extension = $image->extension();

            $image->storeAs('public/products', "{$product->id}.{$image_extension}");
            $product->image = "products/{$product->id}.{$image_extension}";
            $product->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product created.',
            'data' => $product,
        ], 201);
    }

    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Detail of product',
            'data' => $product,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found.',
            ], 404);
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->status = $request->status;
        $product->criteria = $request->criteria;
        $product->description = $request->description;
        $product->is_favorite = $request->is_favorite;
        $product->stock = $request->stock;
        $product->save();

        if ($request->file('image')) {
            $image = $request->file('image');
            $image_extension = $image->extension();

            $image->storeAs('public/products', "{$product->id}.{$image_extension}");
            $product->image = "products/{$product->id}.{$image_extension}";
            $product->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated.',
            'data' => $product,
        ], 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found.',
            ], 404);
        }

        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted.',
        ], 200);
    }
}
