<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class NuevaAutopista implements Rule
{
    protected $request;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
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
        $cadenamientoInicialAutopista = (int) ($this->request->cadenamiento_inicial_km . $this->request->cadenamiento_inicial_m);
        $cadenamientoFinalAutopista   = (int) ($this->request->cadenamiento_final_km . $this->request->cadenamiento_final_m);

        return $cadenamientoInicialAutopista < $cadenamientoFinalAutopista;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El cadenamiento final debe ser mayor que el cadenamiento inicial.';
    }
}
