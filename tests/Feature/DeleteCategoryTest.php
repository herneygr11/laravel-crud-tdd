<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function a_user_can_delete_category(): void
    {
        $this->withoutExceptionHandling();

        $category = factory(Category::class)->create();

        $response = $this->from(route("categories.index"))->delete(route("categories.delete", $category->id));

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.index"));
        $this->assertDeleted($category);
    }
}
