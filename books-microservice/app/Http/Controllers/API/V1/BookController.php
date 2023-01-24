<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Book;
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
    public function __construct()
    {
        //
    }

    public function index()
    {
        $books = Book::all();

        return $this->successReponse($books);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => ['required', 'max:255',],
            'description' => ['required', 'max:255',],
            'price' => ['required', 'min:1',],
            'author_id' => ['required', 'min:1',],
        ];

        $this->validate($request, $rules);

        $book = Book::create($request->all());
        return $this->successReponse($book, Response::HTTP_CREATED);
    }

    public function show($book)
    {
        $book = Book::findOrFail($book);

        return $this->successReponse($book);
    }

    public function update(Request $request, $book)
    {
        $rules = [
            'title' => ['max:255',],
            'description' => ['max:255',],
            'price' => ['min:1',],
            'author_id' => ['min:1',],
        ];

        $this->validate($request, $rules);

        $book = Book::findOrFail($book);

        $book->fill($request->all());

        if ($book->isClean()) {
            return $this->errorReponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $book->save();

        return $this->successReponse($book);
    }


    public function destroy(Request $request, $book)
    {
        $book = Book::findOrFail($book);
        $book->delete();

        return $this->successReponse($book);
    }
}
