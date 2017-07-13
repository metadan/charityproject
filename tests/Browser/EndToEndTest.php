<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

Browser::macro('typeDate', function ($selector, $day, $month, $year) {
    $this->keys($selector, $day)
         ->keys($selector, $month)
         ->keys($selector, $year);

        return $this;
});

Browser::macro('typeTime', function ($selector, $hour, $minute) {
    $this->keys($selector, $hour)
         ->keys($selector, $minute);

        return $this;
});

class EndToEndTest extends DuskTestCase
{

    //https://laracasts.com/discuss/channels/tips/how-to-set-up-and-define-your-database-for-integration-testing
    public function setUp()
    {
      parent::setUp();

      $this->artisan('migrate');
      $this->artisan('db:seed', ['--class' => 'LocationsTableSeeder']);
      $this->artisan('db:seed', ['--class' => 'SkillsTableSeeder']);
    }

    public function tearDown()
    {
      $this->artisan('migrate:reset');
    }

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

    public function testLogin()
    {

        $user = factory(User::class)->create([
            'email' => 'taylor@laravel.com',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'test@test.com')
                    ->type('password', 'Testing123')
                    ->click('#login-submit')
                    ->assertPathIs('/home');
        });   
    }

    public function testAuthenticatedContributionRoute()
    {
        $user = factory(User::class)->create([
            'email' => 'testing@testing.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs(User::find(1))
                    ->visit('/contributions/create')
                    ->assertSee('Want to create a contribution?')
                    ->logout();
        });
    }

    public function testNonAuthenticatedContributionRoute()
    {

        $this->browse(function ($browser){
            $browser->visit('/contributions/create')
                    ->assertSee('Want to create a contribution?')
                    ->assertPathIs('/register');
        });
    }

    public function testAuthenticatedInquiryRoute()
    {
        $user = factory(User::class)->create([
            'email' => 'testing@testing.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs(User::find(1))
                    ->visit('/inquiries/create')
                    ->assertSee('Want to create an inquiry?')
                    ->logout();
        });
    }

    public function testNonAuthenticatedInquiryRoute()
    {

        $this->browse(function ($browser){
            $browser->visit('/inquiries/create')
                    ->assertSee('Want to create an inquiry?')
                    ->assertPathIs('/register');
        });
    }


    public function testCreateContribution()
    {
        $user = factory(User::class)->create([
            'email' => 'testing@testing.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs(User::find(1))
                    ->visit('/contributions/create')
                    ->type('title', 'I can help with gardening')
                    ->type('description', 'I can help with gardening')
                    ->select('location', 'Cambridge')
                    ->typeDate('#date', '01', '01','2018')
                    ->typeTime('#starttime', '10','00')
                    ->typeTime('#endtime', '16','00')
                    ->select('skillsoffered', 'Gardening')
                    ->select('numberofpersonsoffered', '2')
                    ->click('#contribution-submit')
                    ->assertPathIs('/contributions/1')
                    ->logout();
        });
    }

    public function testCreateInquiry()
    {
        $user = factory(User::class)->create([
            'email' => 'testing@testing.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs(User::find(1))
                    ->visit('/inquiries/create')
                    ->type('title', 'I need help with gardening')
                    ->type('description', 'I need help with gardening')
                    ->select('location', 'Cambridge')
                    ->typeDate('#date', '01', '01','2018')
                    ->typeTime('#starttime', '10','00')
                    ->typeTime('#endtime', '16','00')
                    ->select('skillsneeded', 'Gardening')
                    ->select('numberofpersonsneeded', '2')
                    ->click('#inquiry-submit')
                    ->assertPathIs('/inquiries/1')
                    ->logout();
        });
    }

}
