<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class PermissionUserTest extends TestCase
{
  /** @test */
   public function it_should_be_able_to_give_a_permission_to_an_user_permission()
   {
      /** @var User $user */
      $user = User::factory()->createOne();

      $user->givePermissionTo('edit-product');

      $this->assertTrue($user->hasPermissionTo('edit-product'));
      $this->assertDatabaseHas('permissions', [
        'permission' => 'edit-product',
      ]);
   }

  /** @test */
  public function it_should_be_able_access_to_a_route_based_on_the_permission()
  {
    Route::get('test-something-weird', function () {
      return 'test-something-weird';
    })->middleware('permission:edit-product');

    /** @var User $user */
    $user = User::factory()->createOne();

    $this->actingAs($user)
    ->get('test-something-weird')
    ->assertForbidden();

    $user->givePermissionTo('edit-product');
    $this->actingAs($user)
    ->get('/test-something-weird')
    ->assertSuccessful();
  }
}