<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsedFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'feature_id',
        'credits',
    ];

   protected function casts(): array  //Laravel11 new feature
    {
        return [
            'data' => 'array',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
