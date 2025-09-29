<?php 

namespace App\Services;

use App\Repositories\BookRepository;
use Illuminate\Support\Facades\Log;

class BookService
{
    protected $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function getById($id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        $book = $this->repository->find($id);
        if (!$book || $book->state == 0) {
            return null;
        }
        return $this->repository->update($book, $data);
    }

    public function delete($id)
    {
        $book = $this->repository->find($id);
        if (!$book || $book->state == 0) {
            return null;
        }
        return $this->repository->delete($book);
    }
}
