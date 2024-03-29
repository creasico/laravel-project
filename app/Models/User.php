<?php

namespace App\Models;

use Creasi\Base\Contracts\HasCredentialTokens;
use Creasi\Base\Models\Concerns\WithCredentialTokens;
use Creasi\Base\Models\Concerns\WithDevices;
use Creasi\Base\Models\Concerns\WithIdentity;
use Creasi\Base\Models\Contracts\HasDevices;
use Creasi\Base\Models\Contracts\HasIdentity;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property-read int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\CarbonImmutable|null $email_verified_at
 * @property \Carbon\CarbonImmutable|null $created_at
 * @property \Carbon\CarbonImmutable|null $updated_at
 *
 * @method static \Database\Factories\UserFactory<static> factory()
 */
class User extends Authenticatable implements HasCredentialTokens, HasDevices, HasIdentity
{
    use HasFactory;
    use Notifiable;
    use WithCredentialTokens;
    use WithDevices;
    use WithIdentity;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'immutable_datetime',
    ];

    public function password(): Attribute
    {
        return Attribute::set(fn ($value) => \bcrypt($value));
    }
}
