<?php

namespace App\Http\Controllers;

use App\Models\Mobile;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get data of Mobile from DB, and pass into view
        $data = Mobile::all();
        return view('index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //1. get data from Web
        //2. validate
        $request->validate([
            'mobile_name'         =>  'required',
            'description'         =>  'required',
            'maker'               =>  'required',
            'mobile_image'        =>  'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        //get unique name of Mobile
        $file_name = time() . '.' . request()->mobile_image->getClientOriginalExtension();
        request()->mobile_image->move(public_path('images'), $file_name);

        $mobile = new Mobile();
        $mobile->mobile_name = $request->mobile_name;
        $mobile->description = $request->description;
        $mobile->maker = $request->maker;
        $mobile->mobile_image = $file_name;

        echo $mobile;

        //3. Save to DB
        $mobile->save();

        //4. Redirect Mobile list
        return redirect()->route('mobiles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobile $mobile)
    {
        return view('show', compact('mobile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobile $mobile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobile $mobile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobile $mobile)
    {
        //
    }

    public function cart() { // show Mobiles from Cart
        return view('cart');
    }

    public function addToCart($id)
    {
        $mobile = Mobile::find($id);

        if(!$mobile) {
            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $mobile->mobile_name,
                    "quantity" => 1,
                    "price" => $mobile->price,
                    "photo" => $mobile->mobile_image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Mobile added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $mobile->mobile_name,
            "quantity" => 1,
            "price" => $mobile->price,
            "photo" => $mobile->mobile_image
        ];
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }
}
