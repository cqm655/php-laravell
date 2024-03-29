<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
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
    //     $request->validate([
    //         'name' => 'required',
    //     ]);

    //     // ensure the request has a file before we attempt anything else.
    //     if ($request->hasFile('file')) {

    //         $request->validate([
    //             'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
    //         ]);

    //         // Save the file locally in the storage/public/ folder under a new folder named /product
    //         $request->file->store('product', 'public');

    //         // Store the record, using the new file hashname which will be it's new filename identity.
    //         $product = new Product([
    //             "name" => $request->get('name'),
    //             "file_path" => $request->file->hashName()
    //         ]);

    //         $product->save(); // Finally, save the record.
    //     }

    //     return view('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

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
}
