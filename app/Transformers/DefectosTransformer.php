<?php

namespace App\Transformers;

use App\Defecto;
use League\Fractal\TransformerAbstract as BaseTransformer;

class DefectosTransformer extends BaseTransformer
{

    /**
     * Transforma un defecto en arreglo para representarlo en el api.
     *
     * @param  Defecto $defecto
     * @return array
     */
    public function transform(Defecto $defecto)
    {
        return [
            'id'          => $defecto->id,
            'descripcion' => $defecto->descripcion,
            'elemento_id' => $defecto->elemento_id,
        ];
    }
}
