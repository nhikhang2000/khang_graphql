<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilesModel extends Model
{
    protected $table = 'profiles';
    protected $primaryKey = 'id';
    protected $fillable = [
        // 'user_id',
        'first_name',
        'last_name',
        'address'
    ];
    public $timestamps = true;
    use HasFactory;
}
