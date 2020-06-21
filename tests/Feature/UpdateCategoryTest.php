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
    public function a_category_required_min_6_characters_in_name(): void
    {
        $category = factory(Category::class)->create();

        $response = $this->from(route("categories.edit", $category->id))->put(route("categories.update", $category->id), [
            "name" => "from"
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.edit", $category->id));
        $response->assertSessionHasErrors("name");
    }

    /**
     * @return void
     * @test
     */
    public function a_category_required_max_50_characters_in_name(): void
    {
        $category = factory(Category::class)->create();

        $response = $this->from(route("categories.edit", $category->id))->put(route("categories.update", $category->id), [
            "name" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry."
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.edit", $category->id));
        $response->assertSessionHasErrors("name");
    }

    /**
     * @return void
     * @test
     */
    public function a_category_required_max_200_characters_in_description(): void
    {
        $category = factory(Category::class)->create();

        $response = $this->from(route("categories.edit", $category->id))->put(route("categories.update", $category->id), [
            "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.edit", $category->id));
        $response->assertSessionHasErrors("description");
    }

    /**
     * @return void
     * @test
     */
    public function a_category_required_min_10_characters_in_description(): void
    {
        $category = factory(Category::class)->create();

        $response = $this->from(route("categories.edit", $category->id))->put(route("categories.update", $category->id), [
            "description" => "Lorem"
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.edit", $category->id));
        $response->assertSessionHasErrors("description");
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
