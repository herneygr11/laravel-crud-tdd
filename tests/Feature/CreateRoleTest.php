<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateRoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function a_role_required_name_description_and_guard_name(): void
    {
        $response = $this->from(route("roles.create"))->post(route("roles.save"), [
            "name"          => "",
            "description"   => "",
            "guard_name"    => "",
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("roles.create"));
        $response->assertSessionHasErrors(["name", "description", "guard_name"]);
    }

    /**
     * @return void
     * @test
     */
    public function a_user_can_craete_roles(): void
    {
        $this->withoutExceptionHandling();

        $rolePost = [
            "name"          => "Desarrollador Backend",
            "description"   => "Desarrolaldor del lado del servidor",
            "guard_name"    => "web",
        ];

        $response = $this->from(route("roles.create"))->post(route("roles.save"), $rolePost);

        $response->assertStatus(302);
        $response->assertRedirect(route("roles.index"));

        $this->assertDatabaseHas("roles", $rolePost);
    }
}
