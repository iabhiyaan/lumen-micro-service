<?php

namespace App\Services;

use App\Traits\ConsumersExternalService;

class BookService
{

    use ConsumersExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }

    public function obtainBooks()
    {
        return $this->performRequest('GET', 'books');
    }

    public function createBook($data)
    {
        return $this->performRequest('POST', 'books', $data);
    }

    public function obtainBook($authorId)
    {
        return $this->performRequest('GET', 'books/' . $authorId);
    }


    public function updateBook($data, $authorId)
    {
        return $this->performRequest('PUT', 'books/' . $authorId, $data);
    }

    public function deleteBook($authorId)
    {
        return $this->performRequest('DELETE', 'books/' . $authorId);
    }
}
