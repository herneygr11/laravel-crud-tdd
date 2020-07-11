<?php

namespace Tests\Browser;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use function PHPSTORM_META\type;

class UsersCanupdateCategoriesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @return void
     * @test
     */
    public function user_can_update_categories(): void
    {
        $category = factory(Category::class)->create();

        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit(route("categories.index"))
                ->clickLink("editar")
                ->assertSee('Editar Categoria')
                ->clear("name")
                ->clear("description")
                ->type("name", "Fromted")
                ->type("description", "Desarrollador del lado del cliente")
                ->press("#update-category")
                ->assertSee("Fromted")
                ->assertSee("Desarrollador del lado del cliente");
        });
    }

    /**
     * @return void
     * @test
     */
    public function view_button_cancelar(): void
    {
        $category = factory(Category::class)->create();

        $this->browse(function (Browser $browser) use ($category){
            $browser->visit(route("categories.edit", $category->id))
                ->assertSeeLink("Cancelar");
        });
    }
}
