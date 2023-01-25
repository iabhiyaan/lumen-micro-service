<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(public BookService $bookService, public AuthorService $authorService)
    {
        //
    }

    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    public function store(Request $request)
    {
        $this->authorService->obtainAuthor($request->get('author_id'));

        return $this->successResponse($this->bookService->createBook($request->all(), Response::HTTP_CREATED));

    }

    public function show($book)
    {
        return $this->successResponse($this->bookService->obtainBook($book));
    }

    public function update(Request $request, $book)
    {
        return $this->successResponse($this->bookService->updateBook($request->all(), $book));
    }


    public function destroy(Request $request, $book)
    {
        return $this->successResponse($this->bookService->deleteBook($book));
    }
}
