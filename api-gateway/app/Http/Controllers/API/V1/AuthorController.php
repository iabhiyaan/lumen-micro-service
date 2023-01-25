<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(public AuthorService $authorService)
    {
        //
    }

    public function index()
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    public function store(Request $request)
    {

        return $this->successResponse($this->authorService->createAuthor($request->all(), Response::HTTP_CREATED));

    }

    public function show($author)
    {
        return $this->successResponse($this->authorService->obtainAuthor($author));
    }

    public function update(Request $request, $author)
    {
        return $this->successResponse($this->authorService->updateAuthor($request->all(), $author));
    }


    public function destroy(Request $request, $author)
    {
        return $this->successResponse($this->authorService->deleteAuthor($author));
    }
}
