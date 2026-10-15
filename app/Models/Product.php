<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'code', 'cost', 'price', 'quantity', 'description'])]
class Product extends Model
{
    //
}
