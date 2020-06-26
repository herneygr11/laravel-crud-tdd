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
        $this->withoutExceptionHandling();
        $role = factory(Role::class)->create();

        $response = $this->get(route("roles.edit", $role->id));
        $response->assertStatus(200);
    }
}
