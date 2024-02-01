<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makepdf extends Model
{
    use HasFactory;
    public $fillable = ['from', 'to', 'notDone','partialyDone','done','closed'];
}
