<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['product_departement_id', 'user_id'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productDepartement()
    {
        return $this->belongsTo(ProductDepartement::class);
    }
}
