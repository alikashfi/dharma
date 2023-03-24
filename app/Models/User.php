<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable implements FilamentUser, HasName
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['fname', 'lname', 'address', 'postal_code', 'phone', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function isAdmin(): bool
    {
        return !! $this->is_admin;
    }

    public function canAccessFilament(): bool
    {
        return $this->isAdmin();
    }

    public function getFilamentName(): string
    {
        return "{$this->fname} {$this->lname}";
    }
}