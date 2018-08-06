<?php

namespace App\Transformers;

use App\FactorElemento;
use League\Fractal\TransformerAbstract as BaseTransformer;

class FactoresTransformer extends BaseTransformer
{

    /**
     * Transforma un factor en arreglo para representarlo en el api.
     *
     * @param  FactorElemento $factor
     * @return array
     */
    public function transform(FactorElemento $factor)
    {
        return [
            'id'              => $factor->id,
            'factor_elemento' => $factor->factor_elemento,
            'elemento_id'     => $factor->elemento_id,
        ];
    }
}
