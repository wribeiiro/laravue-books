<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all()->toArray();
        return array_reverse($books);
    }

    /**
     * add
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request): \Illuminate\Http\JsonResponse
    {
        $book = new Book([
            'name'   => $request->input('name'),
            'author' => $request->input('author')
        ]);

        $book->save();

        return response()->json('The book successfully added', 201);
    }

    /**
     * edit
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id): \Illuminate\Http\JsonResponse
    {
        $book = Book::find($id);
        return response()->json($book, 200);
    }

    /**
     * update
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request): \Illuminate\Http\JsonResponse
    {
        $book = Book::find($id);
        $book->update($request->all());

        return response()->json('The book successfully updated', 200);
    }

    /**
     * delete
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id): \Illuminate\Http\JsonResponse
    {
        $book = Book::find($id);
        $book->delete();

        return response()->json('The book successfully deleted', 204);
    }
}
