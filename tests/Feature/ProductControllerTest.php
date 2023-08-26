<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class ProductControllerTest extends TestCase
{
    protected User $user;
    protected User $admin;
    protected Product $product;

    public function setUp(): void
    {
        parent::setUp();

        $this->category = Product::factory()->create();
        $this->user = User::factory()->create(['is_admin' => 0]);
        $this->admin = User::factory()->create(['is_admin' => 1]);
    }

    public function test_unauthorized_requests()
    {
        $this->getJson(route('products.getAll'))->assertUnauthorized();
        $this->postJson(route('products.create'))->assertUnauthorized();
        $this->getJson(route('products.getOne', $this->category->id))->assertUnauthorized();
        $this->putJson(route('products.update', $this->category->id))->assertUnauthorized();

        $data = Product::factory()->raw();
        $data['main_image'] = UploadedFile::fake()->image('product.jpg', 150, 150)->size(10);

        $this->actingAs($this->user)->postJson(route('products.create'), $data)->assertForbidden();
        $this->actingAs($this->user)->putJson(route('products.update', $this->category->id), $data)->assertForbidden();
    }

    public function test_success_get_all_products()
    {
        $this->actingAs($this->admin)
            ->getJson(route('products.getAll'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id', 'name', 'price', 'main_image', 'status'
                    ]
                ],
                'meta',
                'links'
            ]);
    }

    public function test_success_create_product()
    {
        $data = Product::factory()->raw();
        $data['main_image'] = UploadedFile::fake()->image('product.jpg', 150, 150)->size(10);

        $this->actingAs($this->admin)
            ->postJson(route('products.create'), $data)
            ->assertCreated()
            ->assertJsonStructure([
                'data' => [
                    'id', 'name', 'price', 'main_image', 'status'
                ]
            ]);
    }
}
