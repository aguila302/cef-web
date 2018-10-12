<?php

namespace App;

use App\ValorPonderado;
use Illuminate\Database\Eloquent\Model;

class ElementoGeneral extends Model
{
    protected $table = 'elementos_generales_camino';

    /**
     * Valores ponderados que pertenecen a este elemento general.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valoresPonderados()
    {
        return $this->hasMany(ValorPonderado::class, 'elemento_general_camino_id');
    }

    /**
     * Elementos que pertenecen a este elemento general.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function elementos()
    {
        return $this->hasMany(Elemento::class, 'elemento_general_camino_id');
    }
}
