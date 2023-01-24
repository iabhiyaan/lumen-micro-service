<?php

namespace App\Services;

use ConsumersExternalService;

class AuthorService
{

    use ConsumersExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }

}
