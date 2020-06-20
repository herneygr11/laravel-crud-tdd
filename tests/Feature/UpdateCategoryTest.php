<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function a_user_can_update_category(): void
    {
        $this->withoutExceptionHandling();
        $category = factory(Category::class)->create();

        $response = $this->from(route("categories.edit", $category->id))->put(route("categories.update", $category->id), [
            "name"          => "Backend",
            "description"   => "Desarrollador del lado del servidor"
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.index"));

        $this->assertDatabaseHas("categories", [
            "name"          => "Backend",
            "description"   => "Desarrollador del lado del servidor"
        ]);
    }
}
