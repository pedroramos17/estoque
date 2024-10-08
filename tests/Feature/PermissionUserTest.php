<?php

namespace Tests\Feature;

use App\Models\Permission;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Cache;
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

  /** @test */
  public function it_should_be_able_to_use_policies_with_my_permissions()
  {
    /** @var User $user */
    $user = User::factory()->createOne();

    $product = $user->products()->save(Product::factory()->make());

    /** @var User $user2 */
    $user2 = User::factory()->createOne();

    $this->actingAs($user2)
      ->delete(route('products.destroy', $product))
      ->assertForbidden();
  }

  /** @test */
  public function the_list_of_permissions_should_be_cached()
  {
    	Permission::query()->create(['permission' => 'edit-product']);

      $fromCache = Cache::get('permissions');
      $this->assertCount(1, $fromCache);
  }
}