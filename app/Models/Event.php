<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function users()
  {
    return $this->belongsToMany(User::class);
  }



}
