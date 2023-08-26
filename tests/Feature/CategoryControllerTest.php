<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\UploadedFile;

class CategoryControllerTest extends TestCase
{
    protected User $user;
    protected User $admin;
    protected Category $category;

    public function setUp(): void
    {
        parent::setUp();

        $this->category = Category::factory()->create();
        $this->user = User::factory()->create(['is_admin' => 0]);
        $this->admin = User::factory()->create(['is_admin' => 1]);
    }

    public function test_unauthorized_requests()
    {
        $this->getJson(route('categories.getAll'))->assertUnauthorized();
        $this->postJson(route('categories.create'))->assertUnauthorized();
        $this->getJson(route('categories.getOne', $this->category->id))->assertUnauthorized();
        $this->putJson(route('categories.update', $this->category->id))->assertUnauthorized();

        $this->actingAs($this->user)->postJson(route('categories.create', Category::factory()->raw()))->assertForbidden();
        $this->actingAs($this->user)->putJson(route('categories.update', $this->category->id), Category::factory()->raw())->assertForbidden();
    }

    public function test_success_get_all_categories()
    {
        $this->actingAs($this->admin)
            ->getJson(route('categories.getAll'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id', 'title', 'description', 'parent_id'
                    ]
                ],
                'meta',
                'links'
            ]);
    }

    public function test_success_create_category()
    {
        $data = Category::factory()->raw();
//        $data['image'] = UploadedFile::fake()->image('product.jpg', 150, 150)->size(10);

        $this->actingAs($this->admin)
            ->postJson(route('categories.create'), $data)
            ->assertCreated()
            ->assertJsonStructure([
                'data' => [
                    'id', 'title', 'description', 'parent_id'
                ]
            ]);
    }

    public function test_success_get_one_category()
    {
        $this->actingAs($this->admin)
            ->getJson(route('categories.getOne', $this->category->id))
            ->assertOk();

        $this->actingAs($this->user)
            ->getJson(route('categories.getOne', $this->category->id))
            ->assertOk();
    }

    public function test_success_update_category()
    {
        $data = $this->category->toArray();

        $data['image'] = UploadedFile::fake()->image('test.jpg', 150, 150)->size(10);

        $this->actingAs($this->admin)
            ->putJson(route('categories.update', [$this->category->id]), $data)
            ->assertOk();
    }
}
