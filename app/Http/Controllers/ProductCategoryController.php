<?php

namespace App\Http\Controllers;

use App\Products;
use App\Categories;
use Illuminate\Http\Request;

    class ProductCategoryController extends Controller
        {
            public function index()
                {
                    $products = Products::orderBy('created_at', 'name_descriptions')->paginate(1);
                    $categories = Categories::all();

                    return view('layouts.catalog', ['products' => $products, 'categories' => $categories]);
                }

        }
