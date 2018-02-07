<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table = 'WishList';
    
    protected $fillable = [
        'product_name','price','user_id','product_image'
    ];
    
    public function WishList(){
		 return $this->hasMany(WishList::class);

	 }
}
