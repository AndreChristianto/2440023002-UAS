<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewHome() {
        $items = Item::paginate(10);

        return view('home', ['items'=>$items]);
    }

    public function viewDetail(Request $request) {
        $detail = Item::find($request->id);

        return view('detail', ['detail'=>$detail]);
    }

    public function viewCart(Request $request) {
        return view('cart');
    }

    public function addToCart($id) {
        $product = Item::find($id);

        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        if(!$cart) {
            $cart = [
                $id => [
                    'item_name' => $product->item_name,
                    'price' => $product->price,
                    'item_id' => $product->id
                ]
            ];
            session()->put('cart', $cart);
            return redirect('/home')->with('success', 'Product added to cart successfully');
        }

        $cart[$id] = [
            'item_name' => $product->item_name,
            'price' => $product->price,
            'item_id' => $product->id
        ];

        session()->put('cart', $cart);
        return redirect('/home')->with('success', 'Product added successfully');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
