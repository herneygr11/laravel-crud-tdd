<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function get_edit_gategory()
    {
        $category = factory(Category::class)->create();

        $response = $this->get(route("categories.edit", $category->id));

        $response->assertStatus(200);
    }

    /**
     * @return void
     * @test
     */
    public function a_category_required_name_and_description(): void
    {
        $category = factory(Category::class)->create();

        $response = $this->from(route("categories.edit", $category->id))->put(route("categories.update", $category->id), [
            "name"          => "",
            "description"   => ""
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.edit", $category->id));
        $response->assertSessionHasErrors(["name", "description"]);
    }

    /**
     * @return void
     * @test
     */
    public function a_user_can_update_category(): void
    {
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
