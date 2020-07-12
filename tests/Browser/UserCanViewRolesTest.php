<?php

namespace Tests\Browser;

use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserCanViewRolesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @return void
     * @test
     */
    public function user_can_view_roles()
    {
        $role = factory(Role::class)->create();

        $this->browse(function (Browser $browser) use ($role) {
            $browser->visit(route("roles.index"))
                ->assertSee($role->name)
                ->assertSee($role->description)
                ->assertSee('Roles')
                ->assertSeeLink('Crear Rol')
                ->assertSeeLink('editar')
                ->assertSee('eliminar')
            ;
        });
    }
}
