<?php

namespace App\Models;

use Faker\Provider\Address;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['firstName', 'lastName', 'email', 'phone', 'address'])]

class Customer extends Model
{
    //
}
