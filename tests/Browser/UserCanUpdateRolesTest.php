<?php

namespace Tests\Browser;

use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserCanUpdateRolesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @return void
     * @test
     */
    public function user_can_update_roles(): void
    {
        $role = factory(Role::class)->create();

        $this->browse(function (Browser $browser) use ($role) {
            $browser->visit(route('roles.index'))
                ->clickLink('editar')
                ->assertSee('Editar Rol')
                ->clear('name')
                ->clear('description')
                ->type('name', 'admin')
                ->type('description', 'in admin can have tool')
                ->press('#update-role')
                ->assertSee('admin')
                ->assertSee('in admin can have tool')
            ;
        });
    }
}
