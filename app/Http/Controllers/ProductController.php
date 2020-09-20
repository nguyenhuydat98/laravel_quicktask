<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Product;
use App\User;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = new Product();
        $product->user_id = Session::get('user_id');
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->description = $request->description;
        $image_name = $request->file('image_link')->getClientOriginalName();
        Storage::putFileAs('public', $request->file('image_link'), $image_name);
        $product->image_link = config('app.link_image') . $image_name;
        $product->original_price = $request->original_price;
        $product->current_price = $request->current_price;
        $product->save();

        return redirect()->route('products.list', [$product->user_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);

            return view('pages.products.edit', compact('product'));
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->id = $request->id;
            $product->name = $request->name;
            $product->brand = $request->brand;
            $product->description = $request->description;
            if ($request->file('image_link') == null) {
                $product->image_link = $request->image_current;
            } else {
                $image_name = $request->file('image_link')->getClientOriginalName();
                Storage::putFileAs('public', $request->file('image_link'), $image_name);
                $product->image_link = config('app.link_image') . $image_name;
            }
            $product->original_price = $request->original_price;
            $product->current_price = $request->current_price;
            $product->save();

            return redirect()->route('products.list', [$product->user_id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user_id = Session::get('user_id');
            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->route('products.list', [$user_id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function findByIdUser($id)
    {
        try {
            $user = User::findOrFail($id);
            $products = $user->products()->orderBy('name')->paginate(config('app.paginate.product'));
            Session::put('user_id', $user->id);

            return view('pages.products.list', [
                'products' => $products,
                'user_name' => $user->name
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
