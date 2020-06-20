<?php

namespace Tests\Browser;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UsersCanViewCategoriesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @return void
     * @test
     */
    public function view_categories(): void
    {
        $category = factory(Category::class)->create();

        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit(route("categories.index"))
                ->assertSee($category->name)
                ->assertSee($category->description);
        });
    }

    /**
     * return void
     * @test
     */
    public function view_button_create_category()
    {
        $this->browse(function (Browser $browser)  {
            $browser->visit(route("categories.index"))
                ->assertSeeLink("Crear categoria")
            ;
        });
    }

    /**
     * return void
     * @test
     */
    public function view_button_update_category()
    {
        $category = factory(Category::class)->create();

        $this->browse(function (Browser $browser) use ($category)  {
            $browser->visit(route("categories.index"))
            ->assertSeeLink("editar")
            ;
        });
    }
}
