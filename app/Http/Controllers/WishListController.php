<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WishList;
use Illuminate\Support\Facades\Auth;
class WishListController extends Controller
{
	//return all rows in our table wishlist

	public function show(){

    	$wishList = WishList::all();
    	return view('scraping.wishList',compact('wishList'));
    }

    //Insert in our database the selected product and take our current user

	public function add($productname,$price){
		$list = new WishList();
		$list->product_name = $productname;
		$list->price=$price;
		$list->user_id = Auth::user()->id;
		$list->save();
		return redirect('/index');
	}


	//Remove the selected product
	
	public function delete($id_prod){
		$list = new WishList();
		$list=WishList::where('id', '=', $id_prod);
		$list->delete();
		return redirect('/wishlist');
	}

}
