<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShoeController extends Controller
{
    //
    public function index(){

        $shoes = Shoe::all();
        return view('catalog') -> with('shoes' ,$shoes);
    }
    //Store (create)
    public function store(Request $req){
        $newShoes = new Shoe();

        $brand=$req->brand;
        $model=$req->model;
        $size=$req->size;
        $color=$req->color;
        $type=$req->type;
        $price=$req->price;

        if($req -> hasFile('image')){
          $image= $req->file('image');
          $img_ext= $image->getClientOriginalExtension();
          $image_name=uniqid(). ' ' . $img_ext;
          $image_folder=public_path('images/');
          $image->move($image_folder,$image_name);

          $newShoes -> brand = $brand;
          $newShoes -> model = $model;
          $newShoes -> size = $size;
          $newShoes -> color = $size;
          $newShoes -> type = $type;
          $newShoes -> price = $price;
          $newShoes -> image = $image_name;
        } else {
            return redirect('/create');
        }

        $newShoes ->save();
        return redirect('/catalog');


    }

    public function edit(){
        $shoes = Shoe::all();

        return view("update", ['shoes' => $shoes]);
    }

    public function update(Request $req){
       $shoe = Shoe::findOrFail($req->selected_shoe);
       $sent = true;

       $sent = true;

       return view("update" , ['shoe' => $shoe , 'sent' => $sent]);
    }

    public function save(Request $req){
        $shoe = Shoe::findOrFail($req->id);

        $shoe->price=$req->price; //facem ca valoarea din input sa vina aici pe urma so salvam in BD

        if($req->hasFile('image')){
            if($shoe->image){
                unlink(public_path('images/' . $shoe->image));
            }
            $image = $req -> file('image');
            $img_ext = $image->getClientOriginalExtension();
            $img_name = uniqid().'.'.$img_ext;

            $img_folder = public_path('images/');

            $image -> move($img_folder, $img_name);

            $shoe -> image = $img_name;
        }

        $shoe -> save();

        return redirect('/catalog');
    }

    public function delete(){
        $shoe = Shoe::all();
        return view('delete',['shoe'=>$shoe]);
    }

    public function destroyWC($id){
     $shoe = Shoe::findOrFail($id);

     if($shoe->image){
         unlink(public_path("images/". $shoe->image));
     }
     $shoe->delete();
     return redirect('/catalog');
    }

    public function delete2(Request $req){
        $shoe = Shoe::findOrFail($req->$id);

        if($shoe->image){
            unlink(public_path("images/". $shoe->image));
        }
        $shoe->delete();
        return redirect('/catalog');
       }

       public function sort(Request $req){
        $shoes = Shoe::all()->where("type", "=", $req->type);
        $type= $req->type;

        return view('sort')->with(compact('shoes'))->with(compact('type'));
       }

       public function cart(Request $req){
           $user = Auth::user();
           $id = $req->shoe_id;

           if(Auth::user()->cart){
            $cartitems = explode("/", $user -> cart); //transoformam in tablou []

           if(!in_array($id, $cartitems)){
            array_push($cartitems,$id);
            $cartStr = implode("/",$cartitems);
            $user ->cart =$cartStr;
           }
           } else {
            //    return "no values";
           $cartItem =[];
           array_push($cartItem, $req->shoe_id);

           $cartStr = implode("/",$cartItem);
           Auth::user()->cart = $cartStr;
           $user -> cart = $cartStr;
           }
           $user -> save();
           return redirect('/cart');
       }

       public function showCart(){
           $userCart = explode('/', Auth::user()->cart);
           $shoes = Shoe::all();

           if(count($userCart)>0){
               $cartItems =[];

               for($i=0; $i<count($shoes); $i++){
                for($j=0; $j<count($userCart); $j++){
                    if($shoes[$i] -> id == $userCart[$j]){
                        array_push($cartItems, $shoes[$i]);
                    }
                }
               }
           }

             return view('cart')->with(compact('cartItems'));

       }
}
