<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use App\Services\BookService;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    use ApiResponse;

    public function index()
    {

        try {

            $books = Book::activos()->get();

            if ($books->isEmpty()) {
                return $this->notFoundResponse("No hay libros registrados");
            }

            return $this->successResponse($books, 'Lista de libros');
        } catch (\Throwable $e) {
            return $this->errorResponse('Error al obtener libros', 500, $e->getMessage());
        }
    }

    public function store(StoreBookRequest  $request)
    {

        try {
            // dd('controlador de guardado');
            // $book = Book::create($request->all());
            $book = Book::create($request->validated());
            return $this->createdResponse($book, 'Libro creado correctamente');
        } catch (\Throwable $e) {
            return $this->errorResponse('Error al crear libro', 500, $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $book = Book::find($id);

            if (!$book) {
                return $this->notFoundResponse("El libro con id {$id} no existe");
            }

            if ($book->state == 0) {
                return $this->alreadyDeletedResponse("El libro con id {$id} ya fue eliminado");
            }

            return $this->successResponse($book, 'Libro encontrado');
        } catch (\Throwable $e) {
            return $this->errorResponse('Error al mostrar libro', 500, $e->getMessage());
        }
    }

    public function update(UpdateBookRequest $request, $id)
    {

        try {
            $book = Book::find($id);

            if (!$book) {
                return $this->notFoundResponse("No se encontró el libro con id {$id}");
            }

            if ($book->state == 0) {
                return $this->alreadyDeletedResponse("No se puede actualizar, el libro con id {$id} ya fue eliminado");
            }

            // $book->update($request->all());
            $book->update($request->validated());
            return $this->updatedResponse($book, "Libro con id {$id} actualizado correctamente");
        } catch (\Throwable $e) {
            return $this->errorResponse('Error al actualizar libro', 500, $e->getMessage());
        }
    }

    public function destroy($id)
    {

        try {

            $book = Book::find($id);

            if (!$book) {
                return $this->notFoundResponse("No se encontró el libro con id {$id}");
            }

            if ($book->state == 0) {
                return $this->alreadyDeletedResponse("El libro con id {$id} ya estaba eliminado");
            }

            $book->update(['state' => 0]);
            return $this->deletedResponse("Libro con id {$id} eliminado correctamente");
        } catch (\Throwable $e) {
            return $this->errorResponse('Error al eliminar libro', 500, $e->getMessage());
        }
    }
}
