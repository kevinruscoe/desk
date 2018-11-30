<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use App\Ticket;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Limit results to agents.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function scopeAgent(Builder $builder)
    {
        return $builder->whereType('agent');
    }

    /**
     * Limit results to customer.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function scopeCustomer(Builder $builder)
    {
        return $builder->whereType('customer');
    }

    /**
     * Is this User a certain type.
     *
     * @param string $type
     * @return bool
     */
    public function isType($type)
    {
        return $this->type === $type;
    }

    /**
     * Returns the tickets for this User, scoped by its type.
     *
     * @return HasMany
     */
    public function tickets()
    {
        return $this->hasMany(
            Ticket::class,
            $this->isType('agent') ? 'agent_id' : 'customer_id'
        );
    }
}
