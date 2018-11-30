<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    public function __toString()
    {
        return $this->label;
    }
}
