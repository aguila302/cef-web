<?php

namespace App;

use App\Intensidad;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    /**
     * Factores que pertenecen a este elemento.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factores()
    {
        return $this->hasMany(FactorElemento::class);
    }

    /**
     * Intensidades que pertenecen a este elemento.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function intensidades()
    {
        return $this->hasMany(Intensidad::class);
    }

    /**
     * Defectos que pertenecen a este elemento.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function defectos()
    {
        return $this->hasMany(Defecto::class);
    }
}
