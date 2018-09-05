<?php

namespace App\Transformers;

use App\Intensidad;
use League\Fractal\TransformerAbstract as BaseTransformer;

class IntensidadTransformer extends BaseTransformer
{

    /**
     * Transforma una intensidad en arreglo para representarlo en el api.
     *
     * @param  Intensidad   $intensidad
     * @return array
     */
    public function transform(Intensidad $intensidad)
    {
        return [
            'id'          => $intensidad->id,
            'descripcion' => $intensidad->descripcion,
            'elemento_id' => $intensidad->elemento_id,
            'defecto_id'  => $intensidad->defecto_id,
        ];
    }
}
