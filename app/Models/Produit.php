<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    
    public $fillable=["designation","description","prix", "category_id","image"];

    public function category ()
    {
        return $this->belongsTo(Category::class); //un produit appartient à une et une seule catégorie
    }

    public function users()
    {
        return $this->belongsToMany(Produits::class);
    }
}
