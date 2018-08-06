<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intensidad extends Model
{
    protected $table = 'intensidades';

    /**
     * Rangos que pertenecen a esta intensidad.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rangos()
    {
        return $this->hasMany(Rango::class);
    }
}
