<?php

namespace App\Transformers;

use App\ElementoGeneral;
use League\Fractal\TransformerAbstract as BaseTransformer;

class ElementoGeneralCaminoTransformer extends BaseTransformer
{

    /**
     * Transforma un elemento general en arreglo para representarlo en el api.
     *
     * @param  ElementoGeneral $elemento
     * @return array
     */
    public function transform(ElementoGeneral $elemento)
    {
        return [
            'id'          => $elemento->id,
            'descripcion' => $elemento->descripcion,
        ];
    }
}
