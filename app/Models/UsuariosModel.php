<?php namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuarios';  
    protected $primaryKey = 'id_usuario';  
    protected $allowedFields = ['correo', 'password', 'nombre', 'apellido', 'telefono', 'direccion', 'tipo_usuario', 'fecha_creacion'];
    protected $useTimestamps = true; 

    public function verificarCredenciales($correo, $password)
    {
        $usuario = $this->where('correo', $correo)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            return $usuario;  
        }
        
        return null; 
    }

    public function crearUsuario($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        
        return $this->insert($data);
    }
}
