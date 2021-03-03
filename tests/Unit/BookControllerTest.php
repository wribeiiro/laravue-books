<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Book;

final class BookControllerTest extends TestCase
{
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * test
     */
    public function testShouldReturnBooks()
    {
        $books = factory(Book::class, 2)->create();

        $this->get(route("books"))
            ->assertStatus(200);
    }

    /**
     * test
     */
    public function testShouldReturnABook()
    {
        $book = factory(Book::class)->create();

        $this->get(route("book.edit", $book->id))
            ->assertStatus(200);
    }

    /**
     * test
     */
    public function testShouldDeleteABook()
    {
        $book = factory(Book::class)->create();

        $this->delete(route("book.delete", $book->id))
            ->assertStatus(204);
    }

    /**
     * test
     */
    public function testShouldSaveABook()
    {
        $data = [
            "name"   => $this->faker->streetName,
            "author" => $this->faker->name()
        ];

        $this->post(route("book.add"), $data)
            ->assertStatus(201);
    }

    /**
     * test
     */
    public function testShouldUpdateABook()
    {
        $book = factory(Book::class)->create();

        $data = [
            'name'   => $this->faker->streetName,
            'author' => $this->faker->name()
        ];

        $this->put(route("book.update", $book->id), $data)
            ->assertStatus(200);
    }
}
