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
        $books = Book::activos()->get();
        return $this->successResponse($books, 'Lista de libros');
    }

    public function store(StoreBookRequest  $request)
    {

        // dd('controlador de guardado');
        // $book = Book::create($request->all());
        $book = Book::create($request->validated());
        return $this->createdResponse($book, 'Libro creado correctamente');
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return $this->notFoundResponse("El libro con id {$id} no existe");
        }

        if ($book->state == 0) {
            return $this->alreadyDeletedResponse("El libro con id {$id} ya fue eliminado");
        }

        return $this->successResponse($book, 'Libro encontrado');
    }

    public function update(UpdateBookRequest $request, $id)
    {
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
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return $this->notFoundResponse("No se encontró el libro con id {$id}");
        }

        if ($book->state == 0) {
            return $this->alreadyDeletedResponse("El libro con id {$id} ya estaba eliminado");
        }

        $book->update(['state' => 0]);
        return $this->deletedResponse("Libro con id {$id} eliminado correctamente");
    }
}
