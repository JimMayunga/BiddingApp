<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
    public function gotoWelcome(Request $request)
    {
        return view('welcome');
    }
    public function gotoLogin(Request $request)
    {
        return view('login');
    }

    public function gotoRegister(Request $request)
    {
        return view('register');
    }

    public function gotoProducts(Request $request)
    {

        $products = Product::where('is_active', true)->get();

        return view('products', ['products' => $products]);
    }

    public function registerUser(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $users_count = User::count();


        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->role = $users_count == 0 ? 'admin' : 'bidder';
        $user->password = $password;

        if($user->save()) {

            return redirect()->route('goto_login');
        } else {
            return redirect()->route('goto_register', ['error' => 'An error has occured']);
        }

    }

    public function loginUser(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        Auth::attempt(['email' => $email, 'password' => $password]);

        if(Auth::check()) {
            return redirect()->route('goto_products');
        } else {
            return redirect()->route('goto_login', ['error' => 'An error has occured']);
        }

    }

    public function gotoNewProductForm()
    {
        return view('new_product');
    }

    public function createProduct(Request $request)
    {
        $product_type = $request->product_type;
        $product_description = $request->description;
        $location = $request->location;

        $product = new Product();
        $product->posted_by = Auth::user()->id;
        $product->description = $product_description;
        $product->product_type = $product_type;
        $product->location = $location;

        $products = Product::where('is_active', true);

        if($product->save()) {

            return redirect()->route('goto_products', ['message' => 'New product created']);
        } else {

            return redirect()->route('goto_products', ['error' => 'An error occured']);

        }




    }
}
