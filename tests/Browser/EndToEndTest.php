<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EndToEndTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testLandingPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('As and When');
        });
    }

    public function testSignup()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'testuser')
                    ->type('email', 'test@test.com')
                    ->type('password', 'Testing123')
                    ->type('password_confirmation', 'Testing123')
                    ->click('#signup-submit')
                    ->assertPathIs('/home');
        });   
    }
}
