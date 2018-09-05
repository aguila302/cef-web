<?php

namespace App;

use App\Intensidad;
use Illuminate\Database\Eloquent\Model;

class Defecto extends Model
{
    /**
     * Rangos que pertenecen a este defecto.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rangos()
    {
        return $this->hasMany(Rango::class);
    }

    /**
     * Intensidades que pertenecen a este defecto.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function intensidades()
    {
        return $this->hasMany(Intensidad::class);
    }
}
