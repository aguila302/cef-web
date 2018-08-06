<?php

namespace App\Transformers;

use App\ValorPonderado;
use League\Fractal\TransformerAbstract as BaseTransformer;

class ValorPonderadoTransformer extends BaseTransformer
{

    /**
     * Transforma un valor ponderado en arreglo para representarlo en el api.
     *
     * @param  ValorPonderado $valorPonderado
     * @return array
     */
    public function transform(ValorPonderado $valorPonderado)
    {
        return [
            'id'                         => $valorPonderado->id,
            'valor_ponderado'            => $valorPonderado->valor_ponderado,
            'valor_ponderado'            => $valorPonderado->valor_ponderado,
            'elemento_general_camino_id' => $valorPonderado->elemento_general_camino_id,
        ];
    }
}
