<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(public BookService $bookService)
    {
        //
    }

    public function index()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($example)
    {

    }

    public function update(Request $request, $example)
    {

    }


    public function destroy(Request $request, $example)
    {

    }
}
