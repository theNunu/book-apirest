<?php


// use App\Http\Requests\StoreBookRequest;
// use App\Http\Requests\UpdateBookRequest;

// class BookController extends Controller
// {
//     public function store(StoreBookRequest $request)
//     {
//         try {
//             $book = Book::create($request->validated());
//             return $this->createdResponse($book, 'Libro creado correctamente');
//         } catch (\Throwable $e) {
//             return $this->errorResponse('Error al crear libro', 500, $e->getMessage());
//         }
//     }

//     public function update(UpdateBookRequest $request, $id)
//     {
//         try {
//             $book = Book::find($id);

//             if (!$book) {
//                 return $this->notFoundResponse("No se encontró el libro con id {$id}");
//             }

//             if ($book->state == 0) {
//                 return $this->alreadyDeletedResponse("No se puede actualizar, el libro con id {$id} ya fue eliminado");
//             }

//             $book->update($request->validated());
//             return $this->updatedResponse($book, "Libro con id {$id} actualizado correctamente");
//         } catch (\Throwable $e) {
//             return $this->errorResponse('Error al actualizar libro', 500, $e->getMessage());
//         }
//     }
// }
