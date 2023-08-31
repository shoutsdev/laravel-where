<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $categories = Category::select("id", "name")
            ->withSum([
                'products' => function ($query) {
                    $query->where('is_active', '1');
                }], 'price')
            ->get()
            ->toArray();

        dd($categories);
    }
}
