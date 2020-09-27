<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testStoreObjectIsCreated()
    {
        $user = [
            'name' => 'User15',
            'email' => 'user15@gmail.com',
            'password'=> Hash::make('123456'),
            'phone'=> '0999999989',
            'address'=>'HN',
            'created_at' => \Carbon\Carbon::parse('08-09-2020 03:26:49')->format('Y-m-d H:i:s')
        ];

        $this->actingAs($user)->post('/some/url');

        $this->assertDatabaseHas('store_objects', [
            'name' => $user->name
        ]);


        $user = factory(User::class)->create();
        $userRepo = new UserRepository(new User);
        $found = $userRepo->show($user->id);
        
        $this->assertInstanceOf(User::class, $found);
        $this->assertEquals($found->title, $user->title);
        $this->assertEquals($found->link, $user->link);
        $this->assertEquals($found->src, $user->src);
    }
}
