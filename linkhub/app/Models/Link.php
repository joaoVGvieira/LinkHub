<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany; // ADICIONE ESTE IMPORT
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Link extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'url',
        'order'
    ]; // Permite criação em massa

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}