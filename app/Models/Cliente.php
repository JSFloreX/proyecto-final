<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Cliente extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $table = 'clientes';

    protected $fillable = [
        'cedula',
        'voucher',
        'nombre',
        'email',
    ];

    protected $hidden = [
        'voucher',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $timestamps = false; // Si tu tabla no los usa

    protected $rememberTokenName = false; // Opcional si no usas recordar sesión

    public function getAuthPassword()
    {
        return $this->voucher;
    }
    public function archivos()
{
    return $this->hasMany(Archivo::class);
}

}
