<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Movies;

class MoviesController extends Controller
{
  public function index()
  {
    try {

      $movies = Movies::all();

      if ($movies->isEmpty()) {
        return response()->json(['message' => 'No se encontraron peliculas'], 404);
      }
      // Devolver una respuesta HTTP 200 OK
      return response()->json(['message' => 'OK', 'data' => $movies], 200);
    } catch (\Throwable $e) {
      \Log::error('Error al hacer la solicitud a la API: ' . $e->getMessage());
      return response()->json(['message' => 'Ocurrió un error interno en el servidor.'], 500);
    }
  }
  /**
   * Muestra la información de una película por su ID.
   *
   * @param int $id El ID de la película.
   *
   * @return response JSON de la data o novedad
   */
  public function show(int $id)
  {
    try {
      //
      $movie = Movies::find($id);

      if (!$movie) {
        return response()->json(['message' => 'No se encontro la pelicula.'], 404);
      }

      // Devolver una respuesta HTTP 200 OK
      return response()->json(['message' => 'OK', 'data' => $movie], 200);
    } catch (\Exeption $e) {
      \Log::error('Error al hacer la solicitud a la API: ' . $e->getMessage());
      return response()->json(['message' => 'Ocurrió un error interno en el servidor.'], 500);
    }
  }
  public function store(Request $request)
  {
    try {
      // Validar los campos enviados por el request
      $validator = Validator::make($request->all(), [
        'title'        => 'required|string',
        'description'  => 'required|string',
        'director'     => 'required|string',
        'genre'        => 'required|integer',
        'poster_image' => 'required|string',
        'release_date' => 'required|date_format:Y-m-d',
      ]);

      // Comprobar si hay errores de validación
      if ($validator->fails()) {
        return response()->json(['message' => 'Error de validación', 'errors' => $validator->errors()], 400);
      }

      // Crear una nueva película con los datos proporcionados en el request
      $movie               = new Movies();
      $movie->title        = $request->input('title');
      $movie->description  = $request->input('description');
      $movie->director     = $request->input('director');
      $movie->genre        = $request->input('genre');
      $movie->poster_image = $request->input('poster_image');
      $movie->release_date = $request->input('release_date');

      $movie->save();

      // Devolver una respuesta HTTP 201 Created con los datos de la película creada
      return response()->json(['message' => 'Película creada correctamente', 'data' => $movie], 201);
    } catch (\Throwable $e) {
      // Manejar el error y registrar el mensaje de error en el archivo de registro
      \Log::error('Error al crear película: ' . $e->getMessage());
      // Devolver una respuesta HTTP 500 Internal Server Error
      return response()->json(['message' => 'Ocurrió un error interno en el servidor.'], 500);
    }
  }
}
