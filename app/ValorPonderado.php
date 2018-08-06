<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValorPonderado extends Model
{
    protected $table = 'valores_ponderados';

    /**
     * Elementos que pertenecen a este valor ponderado.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function elementos()
    {
        return $this->hasMany(Elemento::class);
    }
}
