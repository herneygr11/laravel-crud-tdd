<?php

namespace Tests\Feature;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteRoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     * @test
     */
    public function a_user_can_delete_role(): void
    {
        $this->withoutExceptionHandling();

        $role = factory(Role::class)->create();

        $response = $this->from(route("roles.index"))->delete(route("roles.delete", $role->id));

        $response->assertStatus(302);
        $response->assertRedirect(route("roles.index"));
        $this->assertDeleted($role);
    }

}
