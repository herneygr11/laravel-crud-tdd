<?php

namespace Tests\Feature;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateRoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function a_user_can_see_the_index_roles_view(): void
    {
        $response = $this->get(route("roles.index"));
        $response->assertStatus(200);
    }

    /**
     * @return void
     * @test
     */
    public function a_user_can_see_the_update_view(): void
    {
        $role = factory(Role::class)->create();

        $response = $this->get(route("roles.edit", $role->id));
        $response->assertStatus(200);
    }

    /**
     * @return void
     * @test
     */
    public function a_user_can_update_roles(): void
    {
        $role = factory(Role::class)->create();

        $rolePut = [
            "name"          => "Desarrollador Backend",
            "description"   => "Desarrolaldor del lado del servidor",
            "guard_name"    => "web",
        ];

        $response = $this->from(route("roles.edit", $role->id))->put(route("roles.update", $role->id), $rolePut);

        $response->assertStatus(302);
        $response->assertRedirect(route("roles.index"));

        $this->assertDatabaseHas("roles", $rolePut);
    }
}
