<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewHomeTest extends DuskTestCase
{
    /**
     * @return void
     * @test
     */
    public function user_can_view_home()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('index'))
                ->assertSee('Laravel crud tdd')
                ->assertSeeLink('Inicio')
                ->assertSeeLink('Categorias')
                ->assertSeeLink('Roles')
            ;
        });
    }
}
