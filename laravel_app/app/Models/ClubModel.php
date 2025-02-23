<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClubModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clubs';

    protected $fillable = [
        'name',
        'description',
        'logo',
        'category'
    ];
}