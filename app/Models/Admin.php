<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Admin extends Authenticatable implements FilamentUser
{
    use HasFactory, HasUuids;

    public function canAccessFilament(): bool
    {
        return true;
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}