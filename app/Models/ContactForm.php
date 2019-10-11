<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Suitable\AutoFilter;

class ContactForm extends Model
{
    use AutoFilter;
    protected $guarded = [];
}
