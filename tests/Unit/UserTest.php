<?php

namespace Tests\Unit;
use App\Model\User;
use App\Repositories\User\UserRepository;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        $this->user = User::class;
        $this->userRepository = new UserRepository();
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testStoreObjectIsCreated()
    {
        $data = [
            'name' => 'User15',
            'email' => 'user15@gmail.com',
            'password'=> '123456',
            'phone'=> '0999999989',
            'address'=>'HN',
            'created_at' => \Carbon\Carbon::parse('08-09-2020 03:26:49')->format('Y-m-d H:i:s')
        ];

        // $this->actingAs($user)->post('/some/url');

        // $this->assertDatabaseHas('store_objects', [
        //     'name' => $user->name
        // ]);


        $user1 = User::create($data);
        $found =User::find($user1->id);
        
        $this->assertInstanceOf(User::class, $found);
        $this->assertEquals($found->name, $user1->name);
        $this->assertEquals($found->email, $user1->email);
        $this->assertEquals($found->password, $user1->password);
        $this->assertEquals($found->phone, $user1->phone);
        $this->assertEquals($found->address, $user1->address);

        $this->assertDatabaseHas('users', $data);
        $this->assertTrue(true);
    }
}
