<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $filable = [
        'user_id',
        'post_id',
        'comment',
        'whom'
    ];
}
