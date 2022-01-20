<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * note model
 */
class Note extends Model
{
    protected $fillable =
        [
            'title',
            'content',
        ];


    /**
     * get user write this note
     * @return BelongsTo
     */
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
