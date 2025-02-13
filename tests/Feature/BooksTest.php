<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Inertia\Testing\Assert;
use Inertia\Testing\AssertableInertia;

class BooksTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_home_page_returns_a_successful_response(): void
    {
        $this->get('/')
			->assertInertia(fn (AssertableInertia $page) => $page
                ->component('Index')
                ->has('books')
			);	
    }
}
