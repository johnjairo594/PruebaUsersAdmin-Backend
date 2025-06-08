<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Cargo extends Model
{
    use SoftDeletes;

    protected $table = 'cargos';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'codigo',
        'nombre',
        'activo',
        'idUsuarioCreacion'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'idUsuarioCreacion');
    }
}
