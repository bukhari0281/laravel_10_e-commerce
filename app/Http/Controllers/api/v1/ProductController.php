<?php

namespace App\Http\Controllers\api\v1;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $id = $request->input('id');
        // $name = $request->input('name');
        // $price = $request->input('price');
        // $description = $request->input('description');
        // $stock = $request->input('stock');
        // $is_active = $request->input('is_active');
        // $tags = $request->input('tags');
        
        // if ($id) {
        //     $product = Product::with('galleries')->find($id);
        //     if ($product) {
        //         return ResponseFormatter::success(
        //             $product,
        //             'Data product berhasil diambil'
        //         );
        //     } else {
        //         return ResponseFormatter::error(
        //             null,
        //             'Data product tidak ada',
        //             404
        //         );
        //     }   
        // }

        // $products = Product::with('galleries');
        // if ($name) {
        //     $products->where('name', 'like', '%' . $name . '%');
        // }
        // if ($price) {
        //     $products->where('price', 'like', '%' . $price . '%');
        // }
        // if ($description) {
        //     $products->where('description', 'like', '%' . $description . '%');
        // }
        // if ($stock) {
        //     $products->where('stock', 'like', '%' . $stock . '%');
        // }
        // if ($is_active) {
        //     $products->where('is_active', 'like', '%' . $is_active . '%');
        // }
        // if ($tags) {
        //     $products->where('tags', 'like', '%' . $tags . '%');
        // }
        // return ResponseFormatter::success(
        //     $products->paginate(5),
        //     'Data list product berhasil diambil'
        // );

        $product = Product::with('galleries')->get(); 
        if ($product) {
            return ResponseFormatter::success(
                $product,
                'Data product berhasil diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data product tidak ada',
                404
            );
        }  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product;

        $rules = [
            'name'=>'required|string|max:255',
            'price'=>'required|integer',
            'description'=>'nullable|string',
            'stock'=>'nullable|integer',
            'is_active'=>'required|boolean',
            'tags'=>'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return ResponseFormatter::error(
                null,
                $validator->messages(),
                404
            );
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->is_active = $request->is_active;
        $product->tags = $request->tags;

        $post = $product->save();

        return ResponseFormatter::success(
            $post,
            'Data product berhasil ditambahkan'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('galleries')->find($id); 
        if ($product) {
            return ResponseFormatter::success(
                $product,
                'Data product berhasil diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data product tidak ada',
                404
            );
        }   
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        if (empty($product)) { 
            return ResponseFormatter::error(
                $product,
                'Data product tidak ada',
                404
            );
        }
        
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->is_active = $request->is_active;
        $product->tags = $request->tags;

        $post = $product->save();

        return ResponseFormatter::success(
            $post,
            'Data product berhasil diupdate'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (empty($product)) { 
            return ResponseFormatter::error(
                $product,
                'Data product tidak ada',
                404
            );
        }

        $product->delete();
        return ResponseFormatter::success(
            $product,
            'Data product berhasil dihapus'
        );
    }
}
