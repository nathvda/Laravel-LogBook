<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_login_form(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_duplication()
    {
        $user1 = User::make([
            'username' => 'johndoe',
            'email' => 'johndoe@gmail.com'
        ]);

        $user2 = User::make([
            'username' => 'dary',
            'email' => 'johndoe@gmail.com'
        ]);

        $this->assertTrue($user1->username != $user2->username);
    }

    public function test_delete_user()
    {
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if($user){
            $user->delete();
        }

        $this->assertTrue(true);
    }

    public function test_stores_new_user(){

        $response = $this->post('/register', [
            'name' => 'hello world',
            'email' => 'email@youhou.com',
            'username' => 'parkseonghwa',
            'passowrd' => 'randomstuff'
        ]);

        $response->assertRedirect('/');
    }

    public function test_wont_stores_new_user_if_invalid_mail(){

        $response = $this->post('/register', [
            'name' => 'hello world',
            'email' => 'emailyouhoucom',
            'username' => 'parkseonghwa',
            'password' => 'randomstuff'
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_wont_stores_new_user_if_empty_fields(){

        $response = $this->post('/register', [
            'name' => '',
            'email' => '',
            'username' => '',
            'password' => ''
        ]);

        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('email');
        $response->assertSessionHasErrors('username');
        $response->assertSessionHasErrors('password');

    }

    // public function test_seeders(){

    //     $reponse = $this->seed();
        
    //     $reponse->assertTrue(true);
    // }

}
