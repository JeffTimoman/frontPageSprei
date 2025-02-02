<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDepartement extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function departement(){
        return $this->belongsTo(Departement::class);
    }
}
