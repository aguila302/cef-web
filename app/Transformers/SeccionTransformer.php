<?php

namespace App\Transformers;

use App\Seccion;
use League\Fractal\TransformerAbstract as BaseTransformer;

class SeccionTransformer extends BaseTransformer
{

    /**
     * Transforma una sección en arreglo para representarlo en el api.
     *
     * @param  Seccion $seccion
     * @return array
     */
    public function transform(Seccion $seccion)
    {
        return [
            'cadenamiento_inicial_km' => $seccion->cadenamiento_inicial_km,
            'cadenamiento_inicial_m'  => $seccion->cadenamiento_inicial_m,
            'cadenamiento_final_km'   => $seccion->cadenamiento_final_km,
            'cadenamiento_final_m'    => $seccion->cadenamiento_final_m,
            'autopista_id'            => $seccion->autopista_id,
            'tramo_id'                => $seccion->tramo_id,
            'id'                      => $seccion->id,
            // 'tramo'                   => $seccion->tramo,
            // 'autopista'               => $seccion->autopista,
        ];
    }
}
