<?php

namespace App\Transformers;

use App\Tramo;
use League\Fractal\TransformerAbstract as BaseTransformer;

class TramoTransformer extends BaseTransformer
{

    /**
     * Transforma un tramo en arreglo para representarlo en el api.
     *
     * @param  Tramo $tramo
     * @return array
     */
    public function transform(Tramo $tramo)
    {
        return [
            'cadenamiento_inicial_km' => $tramo->cadenamiento_inicial_km,
            'cadenamiento_inicial_m'  => $tramo->cadenamiento_inicial_m,
            'cadenamiento_final_km'   => $tramo->cadenamiento_final_km,
            'cadenamiento_final_m'    => $tramo->cadenamiento_final_m,
            'autopista_id'            => $tramo->autopista_id,
            'id'                      => $tramo->id,
        ];
    }
}
