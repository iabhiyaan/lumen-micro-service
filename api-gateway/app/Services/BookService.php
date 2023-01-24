<?php

namespace App\Services;

use ConsumersExternalService;

class BookService
{

    use ConsumersExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }

}
