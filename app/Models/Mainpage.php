<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mainpage extends Model
{
    use HasFactory;
    protected $table = 'data_for_mainpage';
    protected $fillable = ['root', 'user', 'site'];
    protected $guarded = ['id'];
}
