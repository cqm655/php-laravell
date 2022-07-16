<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;




class ProductController extends Controller
{


    public function create()
    {
        $products =  Product::all();
        return view('productCRUD.productCreate', compact('products'));
    }

    public function store(Request $req)
    {
        $new_product = new Product();
        $req->all();

        $title = $req->title;
        $style = $req->style;
        $size = $req->size;
        $color = $req->color;
        $price = $req->price;
        $gender = $req->gender;
        $description = $req->description;

        $new_product->product_name = $title;
        $new_product->product_style = $style;
        $new_product->product_size = $size;
        $new_product->product_color = $color;
        $new_product->product_price = $price;
        $new_product->gender = $gender;
        $new_product->product_description = $description;

        $new_product->save();

        if ($req->has('images')) {
            foreach ($req->file('images') as $image) {
                $imageName = time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('product_images'), $imageName);
                Image::create([
                    'product_id' => $new_product->id,
                    'image' => $imageName,
                ]);
            }
        }
        return back()->with('success', 'Added');
    }


    public function images($id)
    {
        $product = Product::find($id);
        if (!$product) abort(404);
        $images = $product->images;
        return view('productCRUD.images', compact('product', 'images'));
    }


    public function catalog()
    {
        $product = Product::latest('id')->value('id');  //get the latest id

        $lastimg = Image::where('product_id', '=', $product)->get(); //relation oneToMany, taking all pictures where foreign key is in Product model
        $last = $lastimg->take(1);
        $last1 = $lastimg->take(2);   //take latest added photo to view on main page
        $last2 = $lastimg->take(3);
        $last3 = $lastimg->take(4);

        if (!$product) abort(404);

        return view('catalog', compact('product', 'last', 'last1', 'last2', 'last3'));
    }

    public function productShow($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        } else {
            $images1 = $product->images->take(1);
            $images2 = $product->images->take(2);
            $images3 = $product->images->take(3);
            $images4 = $product->images->take(4);
            return view('productCRUD.productShow', compact('product', 'images1', 'images2', 'images3', 'images4'));
        }
    }

    public function delete($id)
    {
        $product = Product::find($id);

        $images = Image::where('product_id', '=', $product)->truncate();

        $product->delete();

        return back()->with('deleted', 'Deleted');
    }

    public function editPage(Request $req)
    {
        $id = $req->id;
        $product = Product::find($id);
        $images = Image::where('product_id', '=', $product);

        // chech if images exist properly in DB
        if (!empty($images->image)) {
            $image = $product->images->take(1);
            $image1 = $product->images->take(2);
            $image2 = $product->images->take(3);
            $image3 = $product->images->take(4);
            //  if exist return object`s
            return view('productCRUD.productEdit', compact(
                'product',
                'image',
                'image1',
                'image2',
                'image3'
            ));
        }
        //if not then not
        return view('productCRUD.productEdit', compact(
            'product'
        ));
    }

    public function update(Request $req)
    {
        $edit_product = $req->id;
        $product_id = Product::findOrFail($edit_product);
        $req->all();

        $title = $req->title;
        $style = $req->style;
        $size = $req->size;
        $color = $req->color;
        $price = $req->price;
        $gender = $req->gender;
        $description = $req->description;

        $product_id->product_name = $title;
        $product_id->product_style = $style;
        $product_id->product_size = $size;
        $product_id->product_color = $color;
        $product_id->product_price = $price;
        $product_id->gender = $gender;
        $product_id->product_description = $description;


        $product_id->save();

        $image_id = Image::where('product_id', '=', $product_id)->get();

        if ($req->has('images')) {
            $delete_old_images = Image::where('product_id', '=', $product_id)->truncate();
        }

        foreach ($req->file('images') as $image) {
            $imageName = time() . rand(1, 1000) . '.' . $image->extension();
            $image->move(public_path('product_images'), $imageName);
            Image::create([
                'product_id' => $product_id->id,
                'image' => $imageName,
            ]);
        }

        return redirect('/product-create');
    }
}
