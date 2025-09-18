<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    protected $guarded = [];

    public function borrower() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
