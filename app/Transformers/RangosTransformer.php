<?php

namespace App\Transformers;

use App\Rango;
use League\Fractal\TransformerAbstract as BaseTransformer;

class RangosTransformer extends BaseTransformer
{

    /**
     * Transforma un rango en arreglo para representarlo en el api.
     *
     * @param  Rango $rango
     * @return array
     */
    public function transform(Rango $rango)
    {
        return [
            'id'            => $rango->id,
            'rango_inicial' => $rango->rango_inicial,
            'rango_final'   => $rango->rango_final,
            'defecto_id'    => $rango->defecto_id,
            'intensidad_id' => $rango->intensidad_id,
        ];
    }
}
