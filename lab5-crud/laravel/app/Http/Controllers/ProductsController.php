<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Models\Product;


class ProductsController extends Controller
{
     public function index()
     {
          $products = Product::all();

          return view('products', compact('products'));
     }

     public function createGet() 
     {
          $product = new Product;
          return view('create', compact('product'));
     }

     public function createPost(Request $request)
     {
          $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'price' => 'required'
          ]);

          $img_name = $_FILES['photo']['name'];
          $tmp_img_name = $_FILES['photo']['tmp_name'];
          $path = 'images'.'\\'.$img_name;

          move_uploaded_file($tmp_img_name, $path);

          $product = new Product([
               'name' => $request->input('name'),
               'description' => $request->input('description'),
               'price' => $request->input('price'),
               'photo' => $path]);

		$product->save();

          return redirect()->route('product.index')->with('success', 'A new product has been succesfully created');
   }

     public function delete($productId)
     {
          Product::findOrFail($productId)->delete();

          return redirect()->route('product.index')->with('success', 'Product has been succesfully deleted');
     }

     public function cartGet(Request $request)
     {
          if ($request->session()->has('cart'))
          {
               $sessionProductsIds = $request->session()->get('cart');
               $size = count($sessionProductsIds);

               if ($size > 0)
               {
                    $products = array();

                    for($i=0; $i<$size; $i++)
                    {
                         $index = $sessionProductsIds[$i];

                         if ($index >= 0)
                         {
                              $currentProduct = Product::where('id', $index)->first();

                              if (!is_null($currentProduct))
                              {
                                   array_push($products, $currentProduct);
                              }
                         } 
                    }
                    return view('cart', compact('products'));
               }
               else
               {
                    $emptyProduct = new Product;
                    $emptyProduct->id = -1;
                    $products = array($emptyProduct);

                    return view('cart', compact('products'));
               }
          }
          else 
          {
               $emptyProduct = new Product;
               $emptyProduct->id = -1;

               $products = array($emptyProduct);

               $request->session()->put('cart', $products);

               return view('cart', compact('products'));
          }
     }

     public function addToCart($productId, Request $request)
     {
          if (!$request->session()->has('cart')) 
          {
               $request->session()->put('cart', array($productId));

               return redirect()->route('product.index')->with('success', 'This product was succesfully added to cart');
          }
          else 
          {
               $session = $request->session()->get('cart');
               
               if (!isset($session) || empty($session))
               {
                    $session = array($productId);
               }
               else if (count($session) > 0)
               {
                    array_push($session, $productId);
               }

               $request->session()->put('cart', $session);

               return redirect()->route('product.index')->with('success', 'This product was succesfully added to cart');
          }
     }

     public function clearCart(Request $request) 
     {
          $request->session()->put('cart', array());
          return redirect()->route('product.cartGet')->with('success', 'The cart was succesfully cleaned');
     }

     public function editGet($productId, Request $request)
     {
          $product = Product::where('id', $productId)->first();

          if (!is_null($product))
          {
               return view('update', compact('product'));
          }
          else 
          {
               return redirect()->route('product.index')->with('fail', 'There is no product with such id to be updated');
          }
     }

     public function editPost(Request $request)
     {
          $request->validate([
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'price' => 'required'
          ]);

          $img_name = $_FILES['photo']['name'];
          $tmp_img_name = $_FILES['photo']['tmp_name'];
          $path = 'images'.'\\'.$img_name;
          move_uploaded_file($tmp_img_name, $path);

          DB::update('update products set name = ?, description = ?, photo = ?, price = ? where id = ?',
               [
                    $request->input('name'),
                    $request->input('description'),
                    $path,
                    $request->input('price'),
                    $request->input('id')]);
          
          return redirect()->route('product.index')->with('success', 'Product has been updated succesfully');
     }
}
