<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $table = 'tbl_polls';

    protected $fillable = [
        'title',
        'description',
        'is_active'
    ];

    public function options()
    {
        return $this->hasMany(PollOption::class, 'poll_id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'poll_id');
    }
}
