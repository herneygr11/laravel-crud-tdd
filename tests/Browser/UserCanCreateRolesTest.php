<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserCanCreateRolesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @return void
     * @test
     */
    public function a_user_can_create_roles()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route("roles.index"))
                    ->assertSee("Roles")
                    ->clickLink("Crear Rol")
                    ->assertSee("Crear Rol")
                    ->type("name", "admin")
                    ->type("description", "superuser can create edit update")
                    ->select("guard_name")
                    ->press("#create-role")
                    ->assertSee("admin")
                    ->assertSee("superuser can create edit update")
                    ;
        });
    }
}
