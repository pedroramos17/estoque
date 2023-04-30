<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
      $products = Product::all();
      $tags = Tag::all();
      return view('search', ['products' => $products], ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'code' => 'required|max:255',
        'storage_time' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('produtos/criar')
                    ->withErrors($validator)
                    ->withInput();
    }

    $validator->validated();

      Product::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'location'=>$request->location,
        'check'=>$request->check,
        'created_at'=>$request->created_at,
        'updated_at'=>$request->update_at,
        'hold_reason'=>$request->hold_reason,
        'code'=>$request->code,
        'image'=>$request->image,
        'storage_time'=>$request->storage_time,
        'priority'=>$request->priority,
        'acquired_from'=>$request->acquired_from,
        'acquire_date'=>$request->acquire_date,
        'warranty_term'=>$request->warranty_term,
        'receipt_link'=>$request->receipt_link,
        'user_id'=>$request->user_id,
     ]);
     
     Tag::create([
      'id' => $request->id,
      'name' => $request->name,
    ]);
     
     return redirect('produtos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $product = Product::find($id);
        $tag = ProductTag::findOrFail($id);
        $product = ['tags' => $tag];
        return view('products', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return response()->noContent();
    }
}
