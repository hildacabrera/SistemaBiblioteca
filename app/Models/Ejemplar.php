<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    use HasFactory;
    protected $table = 'ejemplar';
    public $timestamps =false;
    protected $primaryKey = 'id';
}
