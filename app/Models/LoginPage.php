<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginPage extends Model
{
    use HasFactory;
    protected $table = 'data_for_loginpage';
    protected $fillable = ['root', 'user'];
    protected $guarded = ['id'];
}
