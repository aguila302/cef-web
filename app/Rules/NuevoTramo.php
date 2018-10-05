<?php

namespace App\Rules;

use App\Autopista;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class NuevoTramo implements Rule
{
    protected $autopista, $request;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Autopista $autopista, Request $request)
    {
        $this->autopista = $autopista;
        $this->request   = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cadenamientoFinalAutopista = (int) ($this->autopista->cadenamiento_final_km . $this->autopista->cadenamiento_final_m);

        $cadenamientoFinalTramo = (int) ($this->request->cadenamiento_final_km . $this->request->cadenamiento_final_m);
        return $cadenamientoFinalTramo <= $cadenamientoFinalAutopista;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El cadenamiento final del tramo debe ser menor a la de la autopista.';
    }
}
