<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateGategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function a_category_required_name_and_description(): void
    {
        $response = $this->from(route("categories.create"))->post(route("categories.save"), [
            "name"          => "",
            "description"   => ""
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.create"));
        $response->assertSessionHasErrors(["name", "description"]);
    }

    /**
     * @return void
     * @test
     */
    public function a_category_required_min_6_characters_in_name(): void
    {
        $response = $this->from(route("categories.create"))->post(route("categories.save"), [
            "name" => "from"
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.create"));
        $response->assertSessionHasErrors("name");
    }

    /**
     * @return void
     * @test
     */
    public function a_category_required_max_50_characters_in_name(): void
    {
        $response = $this->from(route("categories.create"))->post(route("categories.save"), [
            "name" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry."
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.create"));
        $response->assertSessionHasErrors("name");
    }

    /**
     * @return void
     * @test
     */
    public function a_category_required_min_10_characters_in_description(): void
    {
        $response = $this->from(route("categories.create"))->post(route("categories.save"), [
            "description" => "Lorem"
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.create"));
        $response->assertSessionHasErrors("description");
    }

    /**
     * @return void
     * @test
     */
    public function a_category_required_a_name_and_description_unique(): void
    {
        factory(Category::class)->create([
            "name"          => "Backend",
            "description"   => "Desarrollador del lado del servidor"
        ]);

        $this->assertDatabaseHas("categories", [
            "name"          => "Backend",
            "description"   => "Desarrollador del lado del servidor"
        ]);

        $response = $this->from(route("categories.create"))->post(route("categories.save"), [
            "name"          => "Backend",
            "description"   => "Desarrollador del lado del servidor"
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("categories.create"));
        $response->assertSessionHasErrors(["name", "description"]);
    }

    /**
     * @return void
     * @test
     */
    public function a_user_can_create_category(): void
    {
        $response = $this->from(route("categories.create"))->post(route("categories.save"), [
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
