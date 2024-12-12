<?php namespace App\Controllers;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use App\Models\MobiliarioModel;


class MobiliarioController extends BaseController
{
    public function index()
    {
        $catalogoModel = new MobiliarioModel();

        $items = $catalogoModel->where('estado', 'disponible')->findAll();

        return view('catalogo_view', ['items' => $items]);
    }

    public function agregarCarrito($id)
    {
        $catalogoModel = new MobiliarioModel();
        $producto = $catalogoModel->find($id);
    
        if (!$producto) {
            return redirect()->to('/catalogo')->with('mensaje', 'El producto no existe.');
        }
    
        $cantidadSolicitada = $this->request->getPost('cantidad');
    
        if ($cantidadSolicitada > $producto['cantidad_disponible']) {
            return redirect()->to('/catalogo')->with('mensaje', 'La cantidad solicitada excede el stock disponible.');
        }
    
        $carrito = session()->get('carrito') ?? [];
    
        if (isset($carrito[$id])) {
            $nuevaCantidad = $carrito[$id]['cantidad'] + $cantidadSolicitada;
    
            if ($nuevaCantidad > $producto['cantidad_disponible']) {
                return redirect()->to('/catalogo')->with('mensaje', 'La cantidad total excede el stock disponible.');
            }
    
            $carrito[$id]['cantidad'] = $nuevaCantidad;
        } else {
            $carrito[$id] = [
                'id_mobiliario' => $producto['id_mobiliario'],
                'nombre' => $producto['nombre'],
                'descripcion' => $producto['descripcion'],
                'costo_renta' => $producto['costo_renta'],
                'foto' => $producto['foto'],
                'cantidad' => $cantidadSolicitada,
            ];
        }
    
        session()->set('carrito', $carrito);
    
        return redirect()->to('/catalogo')->with('mensaje', 'Producto agregado al carrito.');
    }
    


    public function verCarrito()
    {
        $carrito = session()->get('carrito') ?? [];

        return view('carrito_view', ['carrito' => $carrito]);
    }

    public function eliminarDelCarrito($id)
    {
        $carrito = session()->get('carrito') ?? [];

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
        }

        session()->set('carrito', $carrito);

        return redirect()->to('/carrito')->with('mensaje', 'Producto eliminado del carrito.');
    }



    public function generarQR()
    {
        $instrucciones = "Instrucciones de alquiler:\n1. Completar el pago.\n2. Recoger el mobiliario en el punto de entrega.\n3. Disfruta del alquiler.";
        
        $qrCode = new QrCode($instrucciones);
        $writer = new PngWriter();
        
        $uploadPath = FCPATH . 'public/uploads/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true); 
        }
        
        $filePath = $uploadPath . 'qr_code.png';
        
        $writer->write($qrCode)->saveToFile($filePath);
        
        return view('carrito_view', ['qrUrl' => base_url('public/uploads/qr_code.png')]);
    }
    

    

}
