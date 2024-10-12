<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $products = Product::orderBy('id', 'desc')->get();
        
        return view('be.product.index')->with('products', $products); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('be.product.create');
    }

    private function validateAndStoreImages(Request $request, Product $product)
    {
        $request->validate(
            [
                'url.*' => 'nullable|image|max:2024|mimes:jpg,jpeg,png',
            ],
        );

        if ($request->hasFile('url')) {
            foreach ($request->file('url') as $file) {
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/gallery', $fileName);

                $product->galleries()->create([
                    'url' => $fileName,
                ]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $save = DB::transaction(function () use ($request) {
            $product = Product::create($request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'description' => 'nullable|string',
                'is_active' => 'required',
                'tags' => 'nullable|string',
            ]));
            $this->validateAndStoreImages($request, $product);
        });

        return redirect()->route('product.index')->with('success', 'Product created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 
        $product = Product::with('galleries')->find($id);
        // $product->galleries = explode($product->galleries, ' ');
        
        return view('be.product.update')->with('product', $product); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]); 

        // Jika validasi berhasil, simpan data
        $products = Product::create($request->all());

        return redirect()->route('product.index', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
