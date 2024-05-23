<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductosConfiteria;

class ProductosConfiteriaController extends Controller
{
    public function store(Request $request)
    {
        try {
        // Validar los campos enviados por el request
        $validator = Validator::make($request->all(), [
            'nombre'        => 'required|string',
            'descripcion'   => 'required|string',
            'precio'        => 'required|string',
            'categoria'        => 'required|string',
            'imagen_producto' => 'required|string'
        ]);

        // Comprobar si hay errores de validación
        if ($validator->fails()) {
            return response()->json(['message' => 'Error de validación', 'errors' => $validator->errors()], 400);
        }

        // Crear una nueva película con los datos proporcionados en el request
        $movie                  = new ProductosConfiteria();
        $movie->nombre          = $request->input('nombre');
        $movie->descripcion     = $request->input('descripcion');
        $movie->precio          = $request->input('precio');
        $movie->categoria       = $request->input('categoria');
        $movie->imagen_producto = $request->input('imagen_producto');

        $movie->save();

        // Devolver una respuesta HTTP 201 Created con los datos de la película creada
        return response()->json(['message' => 'confiteria creada correctamente', 'data' => $movie], 200);
        } catch (\Throwable $e) {
        // Manejar el error y registrar el mensaje de error en el archivo de registro
        \Log::error('Error al crear película: ' . $e->getMessage());
        // Devolver una respuesta HTTP 500 Internal Server Error
        return response()->json(['message' => 'Ocurrió un error interno en el servidor.'.$e->getMessage()], 500);
        }
    }

    public function obtenerConfiteria()
    {
        try {
            $confiteria = ProductosConfiteria::get();

            return response()->json(['message' => 'OK', 'data' => $confiteria], 200);
        } catch (\Throwable $e) {
            \Log::error('Error al hacer la solicitud a la API: ' . $e->getMessage());
            return response()->json(['message' => 'Ocurrió un error interno en el servidor.'], 500);
        }
    }

    public function obtenerConfiteriaId($id)
    {
        try {
            $confiteria = ProductosConfiteria::where('id_producto', '=', $id)->first();

            return response()->json(['message' => 'OK', 'data' => $confiteria], 200);
        } catch (\Throwable $e) {
            \Log::error('Error al hacer la solicitud a la API: ' . $e->getMessage());
            return response()->json(['message' => 'Ocurrió un error interno en el servidor.'.$e->getMessage()], 500);
        }
    }

    public function obtenerCombos()
    {
        try {
            $combos = ProductosConfiteria::where('categoria', '=', 'combos')->get();

            return response()->json(['message' => 'OK', 'data' => $combos], 200);
        } catch (\Throwable $e) {
            \Log::error('Error al hacer la solicitud a la API: ' . $e->getMessage());
            return response()->json(['message' => 'Ocurrió un error interno en el servidor.'], 500);
        }
    }
}
