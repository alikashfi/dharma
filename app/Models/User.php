<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable implements FilamentUser, HasName
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['fname', 'lname', 'address', 'postal_code', 'phone', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];
    protected $appends = ['fullname'];

    protected function fullname(): Attribute
    {
        return Attribute::make(
            get: fn() => "$this->fname $this->lname"
        );
    }

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

    public function hasDetails(): bool
    {
        return count(array_filter($this->only('fname', 'lname', 'address', 'postal_code', 'phone'))) === 5;
    }
}