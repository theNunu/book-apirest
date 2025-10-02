<?php 

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function all()
    {
        return Book::activos()->get();
    }

    public function find($id)
    {
        return Book::find($id);
    }

    public function create(array $data)
    {
        return Book::create(attributes: $data);
    }

    public function update(Book $book, array $data)
    {
        $book->update($data);
        return $book;
    }

    public function delete(Book $book)
    {
        $book->state = 0;
        $book->save();
        return $book;
    }
}
