<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionUserTest extends TestCase
{
  /** @test */
   public function it_should_be_able_to_give_a_permission_to_an_user_permission()
   {
      /** @var User $user */
      $user = User::factory()->create();

      $user->givePermissionTo('edit-product');

      $this->assertTrue($user->hasPermissionTo('edit-product'));
      $this->assertDatabaseHas('permissions', [
        'permission' => 'edit-product',
      ]);
   }
}
