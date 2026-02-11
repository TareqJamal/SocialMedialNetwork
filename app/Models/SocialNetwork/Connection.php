<?php

namespace App\Models\SocialNetwork;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;

    protected $table = 'connections';
    protected $fillable = ['user_id', 'connected_id','status'];
}
