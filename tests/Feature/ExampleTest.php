<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use ShopsTableSeeder;
use CategoriesSeeder;
use ConvenisTableSeeder;
use PrefecturesTableSeeder;
use App\Product;


class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * 
     * @test
     */
    public function testBasicTest()
    {
        $this->seed(CategoriesSeeder::class);
        $this->seed(ConvenisTableSeeder::class);
        $this->seed(PrefecturesTableSeeder::class);
        $this->seed(ShopsTableSeeder::class);
        

        $products = factory(Product::class, 10)->create();
        // dd($products->toArray());

        $response = $this->getJson('ajax/products');
        // dd($response);

        $response
        ->assertStatus(200)
        ->assertJsonCount(10);
    }


}
