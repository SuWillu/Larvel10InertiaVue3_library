<?php

namespace Tests\Unit;

use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_home_page_returns_a_successful_response(): void
    {
        $this->get('/')->assertStatus(200);
    }
}
