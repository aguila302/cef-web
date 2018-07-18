<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract as BaseTransformer;

class UsuarioTransformer extends BaseTransformer
{

    /**
     * Transforma un usuario en arreglo para representarlo en el api.
     *
     * @param  User   $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'       => $user->id,
            'name'     => $user->name,
            'username' => $user->name,
            'email'    => $user->email,
        ];
    }
}
