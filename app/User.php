<?php

namespace App;

use App\Autopista;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Atributos que son asignados en masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Autopistas asignadas a este usuario.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function autopistas()
    {
        return $this->belongsToMany(Autopista::class, 'autopistas_usuarios')->withTimestamps();
    }

    /**
     * Asigna autopistas a este usuario.
     *
     * @param Collection|array $autopista
     *
     * @return void
     */
    public function asignaAutopista($autopista)
    {
        $this->autopistas()->attach($autopista);
    }

    /**
     * Quita aautopistas asignadas a este usuario.
     *
     * @param mixed $autopista
     *
     * @return void
     */
    public function quitaAutopista($autopista)
    {
        $this->autopistas()->detach($autopista);
    }

    /**
     * Crea un usuario en el origen de datos.
     *
     * @param array $data.
     *
     * @return User $usuario
     */
    public static function crearUsuario($data)
    {
        $usuario = new static($data);
        $usuario->save();
        return $usuario;
    }
}
