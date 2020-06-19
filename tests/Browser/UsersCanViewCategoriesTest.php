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
    public function view_categories()
    {
        $category = factory(Category::class)->create();

        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit(route("categories.index"))
                    ->assertSee($category->name)
                    ->assertSee($category->description)
                    ;
        });
    }
}
