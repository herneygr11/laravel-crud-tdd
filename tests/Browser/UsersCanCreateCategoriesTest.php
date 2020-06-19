<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UsersCanCreateCategoriesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     * @test
     */
    public function a_users_can_create_categories(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route("categories.create"))
                    ->assertSee("Crear Categoria")
                    ->type("name", "Backend")
                    ->type("description", "Desarrollador del lado del servidor")
                    ->press("#create-category")
                    ->assertSee("Backend")
                    ->assertSee("Desarrollador del lado del servidor")
                    ;
        });
    }
}
