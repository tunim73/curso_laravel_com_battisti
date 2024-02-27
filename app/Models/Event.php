<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
  use HasFactory;
  protected $guarded = [];

  protected $casts = [
    'items' => 'array'
  ];

  protected $date = [
    'date'
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function users(): BelongsToMany
  {
    return $this->belongsToMany(User::class);
  }



}
