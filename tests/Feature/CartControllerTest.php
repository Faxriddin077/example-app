<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class CartControllerTest extends TestCase
{
    protected User $user;
    protected Product $product;

    public function setUp(): void
    {
        parent::setUp();

        Category::factory(10)->create();
        $this->product = Product::factory()->create();
        $this->user = User::factory()->create(['is_admin' => 0]);
    }

    public function test_unauthorized_requests()
    {
        $this->getJson(route('cart.getAll'))->assertUnauthorized();
        $this->postJson(route('cart.addToCart'))->assertUnauthorized();
        $this->postJson(route('cart.removeFromCart'))->assertUnauthorized();
    }

    public function test_fail_add_product(): void
    {
        $this->actingAs($this->user)
            ->postJson(route('cart.addToCart'), ['product_id' => 0])
            ->assertSee('InvalidCartProductException')
            ->assertStatus(500);
    }

    public function test_success_get_all_user_cart_items()
    {
        $this->actingAs($this->user)
            ->getJson(route('cart.getAll'))
            ->assertOk();
    }

    public function test_success_add_product_to_cart(): void
    {
        $this->actingAs($this->user)
            ->postJson(route('cart.addToCart'), ['product_id' => $this->product->id])
            ->assertOk();
    }

    public function test_success_remove_product_from_cart(): void
    {
        $this->actingAs($this->user)
            ->postJson(route('cart.addToCart'), ['product_id' => $this->product->id]);

        $this->actingAs($this->user)
            ->deleteJson(route('cart.removeFromCart'), ['product_id' => $this->product->id])
            ->assertOk();
    }
}
