<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    const CREATED_AT= 'createdAt';
    const UPDATED_AT = 'updatedAt';

    protected $fillable = [
        'id',
        'idUser',
        'name',
        'email',
        'tags'
    ];

    protected $primaryKey = 'id';
    public $incrementing = false;
}
