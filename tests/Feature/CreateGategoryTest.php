<?php

namespace Tests\Feature;

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
