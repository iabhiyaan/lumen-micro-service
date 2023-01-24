<?php

namespace App\Services;

use App\Traits\ConsumersExternalService;

class AuthorService
{

    use ConsumersExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }

    public function obtainAuthors()
    {
        return $this->performRequest('GET', 'authors');
    }

    public function createAuthor($data)
    {
        return $this->performRequest('POST', 'authors', $data);
    }

    public function obtainAuthor($authorId)
    {
        return $this->performRequest('GET', 'authors/' . $authorId);
    }


    public function updateAuthor($data, $authorId)
    {
        return $this->performRequest('PUT', 'authors/' . $authorId, $data);
    }

    public function deleteAuthor($authorId)
    {
        return $this->performRequest('DELETE', 'authors/' . $authorId);
    }
}
