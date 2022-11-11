<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brewerie;

class Beer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description', 'country', 'brand', 'vol'];

    public function breweries(){
        return $this->belongsToMany(Brewerie::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
