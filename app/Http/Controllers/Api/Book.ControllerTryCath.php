<?php

// namespace App\Http\Controllers;

// use App\Models\Book;
// use App\Traits\ApiResponse;
// use Illuminate\Http\Request;

// class BookController extends Controller
// {
//     use ApiResponse;

//     public function index()
//     {
//         try {
//             $books = Book::activos()->get();

//             if ($books->isEmpty()) {
//                 return $this->notFoundResponse("No hay libros registrados");
//             }

//             return $this->successResponse($books, 'Lista de libros encontrados');
//         } catch (\Throwable $e) {
//             return $this->errorResponse('Error al obtener libros', 500, $e->getMessage());
//         }
//     }

//     public function store(Request $request)
//     {
//         try {
//             $book = Book::create($request->all());
//             return $this->createdResponse($book, 'Libro creado correctamente');
//         } catch (\Throwable $e) {
//             return $this->errorResponse('Error al crear libro', 500, $e->getMessage());
//         }
//     }

//     public function show($id)
//     {
//         try {
//             $book = Book::find($id);

//             if (!$book) {
//                 return $this->notFoundResponse("El libro con id {$id} no existe");
//             }

//             if ($book->state == 0) {
//                 return $this->alreadyDeletedResponse("El libro con id {$id} ya fue eliminado");
//             }

//             return $this->successResponse($book, 'Libro encontrado');
//         } catch (\Throwable $e) {
//             return $this->errorResponse('Error al mostrar libro', 500, $e->getMessage());
//         }
//     }

//     public function update(Request $request, $id)
//     {
//         try {
//             $book = Book::find($id);

//             if (!$book) {
//                 return $this->notFoundResponse("No se encontró el libro con id {$id}");
//             }

//             if ($book->state == 0) {
//                 return $this->alreadyDeletedResponse("No se puede actualizar, el libro con id {$id} ya fue eliminado");
//             }

//             $book->update($request->all());
//             return $this->updatedResponse($book, "Libro con id {$id} actualizado correctamente");
//         } catch (\Throwable $e) {
//             return $this->errorResponse('Error al actualizar libro', 500, $e->getMessage());
//         }
//     }

//     public function destroy($id)
//     {
//         try {
//             $book = Book::find($id);

//             if (!$book) {
//                 return $this->notFoundResponse("No se encontró el libro con id {$id}");
//             }

//             if ($book->state == 0) {
//                 return $this->alreadyDeletedResponse("El libro con id {$id} ya estaba eliminado");
//             }

//             $book->update(['state' => 0]);
//             return $this->deletedResponse("Libro con id {$id} eliminado correctamente");
//         } catch (\Throwable $e) {
//             return $this->errorResponse('Error al eliminar libro', 500, $e->getMessage());
//         }
//     }
// }
