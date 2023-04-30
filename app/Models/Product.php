<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory, HasUuids;

  protected $table = 'products';
  protected $fillable = [
    'name',
    'description',
    'location',
    'check',
    'created_at',
    'updated_at',
    'hold_reason',
    'code',
    'image',
    'storage_time',
    'priority',
    'acquired_from',
    'acquire_date',
    'warranty_term',
    'receipt_link',
    'user_id',
  ];
 
  public function relUsers() {
    return $this->belongsTo(User::class, 'user_id');
  }
}
