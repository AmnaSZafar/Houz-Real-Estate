<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addProperty extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['result','type','area','price','user_id','image_path'];
}
