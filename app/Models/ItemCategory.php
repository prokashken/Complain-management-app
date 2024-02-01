<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemCategory extends Model
{
    use HasFactory;

    // public static function List(){
    //     return Error::get();
    // }

    // public static function ListWithId($id){

    //     return Error::where('id',$id)->first();
    // }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
