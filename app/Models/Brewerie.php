<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beer;

class Brewerie extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['user_id', 'name', 'description', 'url', 'beers'];

    /**
     * Return user creator relación 1:N (User:Brewerie)
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Return beers served relación N:M (Beer:Brewerie)
     */
    public function beers(){
        return $this->belongsToMany(Beer::class);
    }
}
