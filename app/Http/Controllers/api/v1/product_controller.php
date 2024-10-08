<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class product_controller extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $price = $request->input('price');
        $type = $request->input('description');
        $price = $request->input('price');
        return response()->json([
            'status' => 200,
            'products' => []
        ]);
    }
}
