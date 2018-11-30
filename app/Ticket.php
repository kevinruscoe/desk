<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\TicketStatus;

class Ticket extends Model
{
    /**
     * Assigns ticket an agent.
     *
     * @return bool
     */
    public function setAgent(User $agent)
    {
        return $this->agent()->associate($agent)->save();
    }

    /**
     * The agent assigned to this ticket.
     *
     * @return User
     */
    public function agent()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'unassigned'
        ]);
    }

    /**
     * The customer assigned to this ticket.
     *
     * @return User
     */
    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The status of the ticket.
     *
     * @return TicketStatus
     */
    public function status()
    {
        return $this->belongsTo(TicketStatus::class, 'ticket_status_id');
    }

    /**
     * The status of the ticket.
     *
     * @return TicketStatus
     */
    public function setStatus(TicketStatus $ticketStatus)
    {
        return $this->status()->associate($ticketStatus)->save();
    }

    /**
     * Limit the scope to the logged in user.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function scopeMine(Builder $builder)
    {
        return $builder->where('agent_id', auth()->id() ?? '*');
    }

    /**
     * Limit the scope to unassigned.
     *
     * @param Builder $builder
     * @return Builder
     */
    public function scopeUnassigned(Builder $builder)
    {
        return $builder->doesntHave('agent');
    }
}
