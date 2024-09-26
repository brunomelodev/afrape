<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'cpf',
        'rg',
        'birthday',
        'nis',
        'ra',
        'responsible_name',
        'phone',
        'whatsapp',
        'gender',
        'origin_school',
        'series',
        'class',
        'date_of_entry',
        'active',
        'support',
        'status',
    ];

    protected $hidden = [
        // 'password',
    ];

    protected function casts(): array
    {
        return [
            // 'email_verified_at' => 'datetime',
            // 'password' => 'hashed',
        ];
    }


}
