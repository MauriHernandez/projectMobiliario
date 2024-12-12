<?php namespace App\Models;

use CodeIgniter\Model;

class MobiliarioModel extends Model
{
    protected $table = 'mobiliario'; 
    protected $primaryKey = 'id_mobiliario';
    protected $allowedFields = ['nombre', 'descripcion', 'cantidad_disponible', 'costo_renta', 'costo_dano', 'estado', 'id_categoria','foto'];
}
