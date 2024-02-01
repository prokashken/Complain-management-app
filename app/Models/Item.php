<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;
    public $fillable = ['days_left_warranty'];

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cat(): BelongsTo
    {
        return $this->belongsTo(ItemCategory::class,'category','id');
    }

    public static function items(){
        return Item::get()->unique('category');
    }

    public static function itemList(){
        return Item::get()->unique('category');
    }

    public static function List(){
        return Item::get();
    }

    public static function ListById($id){
        return Item::where('user_id',$id)->get()->unique('category');
    }

    public static function ListById2($id){
        return Item::where('id',$id)->first();
    }

}
