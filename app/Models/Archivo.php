<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'filename'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
