<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{

    protected $table='eleves';
    protected $primaryKey='id';
    protected $fillable=['name','prenom','age'];
    use HasFactory;
}
