<?php

namespace Tests\Browser;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserCanDeleteCategoriesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @return void
     * @test
     */
    public function a_user_can_delete_categories()
    {
        $category = factory(Category::class)->create();

        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit(route("categories.index"))
                ->assertSee($category->name)
                ->assertSee($category->description)
                ->assertSee("eliminar")
                ->press("#delete-category")
                ->assertDontSee($category->name)
                ->assertDontSee($category->description)
                ;
        });
    }
}
