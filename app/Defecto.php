<?php

namespace App;

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
}
