<?php

use App\User;

/**
 * Crea un usuario para testing.
 *
 * @return [User].
 */
function creaUsuarioTest()
{
    $user = factory(User::class)->create();
    return $user;
}
