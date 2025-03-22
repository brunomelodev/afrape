<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name', 'cnpj', 'address_id'];

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

}
