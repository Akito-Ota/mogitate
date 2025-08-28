<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;       
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q     = trim($request->query('q', ''));                
        $sort  = $request->query('sort', '');                  
        $query = Product::query();

        if ($q !== '') {
            $query->where('name', 'like', "%{$q}%");
        }

        if ($sort === 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('price', 'desc');
        } else {
        
            $query->latest('id');
        }


        $products = $query->paginate(6)->appends($request->query());

        return view('index', compact('products', 'q', 'sort'));
    }

    public function show($id)
    {
        $product = Product::with('seasons')->findOrFail($id);
        $seasons = Season::all(); 

        return view('show', compact('product', 'seasons'));
    }

    public function create()
    {
        $seasons = Season::all(); 
        return view('create', compact('seasons'));
    }
}
