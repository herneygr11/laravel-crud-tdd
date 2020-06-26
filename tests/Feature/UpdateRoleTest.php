<?php

namespace Tests\Feature;

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
        $this->withoutExceptionHandling();

        $response = $this->get(route("roles.index"));
        $response->assertStatus(200);
    }

}
