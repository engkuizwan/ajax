<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_product extends Model
{
    use SoftDeletes;
    protected $table = 'product';
    protected $fillabel = [
        'name'
    ];
    protected $hidden;
}
