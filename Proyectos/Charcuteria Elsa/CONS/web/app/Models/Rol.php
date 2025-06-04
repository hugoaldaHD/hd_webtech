<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id_rol';
    protected $fillable = ['nombre'];

    public function usuarios()
    {
        return $this->hasMany(User::class, 'id_rol');
    }
}