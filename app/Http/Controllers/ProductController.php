<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RecentViewItem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $recent_view_items = RecentViewItem::where('product_id',$id)->first();
        if(!isset($recent_view_items->id)) {
            RecentViewItem::create([
                'product_id' => $id,
            ]);
        }
        $recent_views = RecentViewItem::with(['product'])->whereNotIn('product_id',[$id])->get();

        return view('product_show',compact('product','recent_views'));
    }


    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name"          => $product->name,
                "quantity"      => 1,
                "retail_price"  => $product->retail_price,
                "price"         => $product->price,
                "image"         => $product->image
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart',$cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

}
