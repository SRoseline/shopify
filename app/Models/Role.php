<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $fillable=["profil"];
    use HasFactory;

    public function users()
    
    {
return $this->hasMany(Users::class);

    }

}
