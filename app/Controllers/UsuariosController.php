<?php namespace App\Controllers;

use App\Models\UsuariosModel;

class UsuariosController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        return view('register_view');
    }

    public function registrar()
    {
        $correo = $this->request->getPost('correo');
        
        $usuarioExistente = $this->db->table('usuarios')->where('correo', $correo)->get()->getRow();

        if ($usuarioExistente) {
            return redirect()->to(site_url('register'))->with('mensaje', 'El usuario ya está registrado. Por favor, inicie sesión.');
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'correo' => $correo,
            'telefono' => $this->request->getPost('telefono'),
            'direccion' => $this->request->getPost('direccion'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'tipo_usuario' => 2,
            'fecha_creacion' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('usuarios')->insert($data);

        return redirect()->to(site_url('login'))->with('mensaje', 'Usuario registrado exitosamente. Por favor, inicie sesión.');
    }

    public function login()
    {
        return view('iniciar_sesion'); 
    }

    public function autenticar()
    {
        $correo = $this->request->getPost('correo');
        $password = $this->request->getPost('password');

        $usuario = $this->db->table('usuarios')->where('correo', $correo)->get()->getRow();

        if ($usuario && password_verify($password, $usuario->password)) {
            session()->set([
                'id_usuario' => $usuario->id_usuario,
                'nombre' => $usuario->nombre,
                'correo' => $usuario->correo,
                'isLoggedIn' => true,
            ]);

            return redirect()->to(site_url('home')); 
        }
        return redirect()->to(site_url('login'))->with('mensaje', 'Correo o contraseña incorrectos.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'))->with('mensaje', 'Sesión cerrada correctamente.');
    }

    public function home()
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to(site_url('login'))->with('mensaje', 'Debes iniciar sesión primero.');
    }

    $usuario = [
        'nombre' => session()->get('nombre'),
        'correo' => session()->get('correo'),
    ];

    return view('home', $usuario);
}

}
