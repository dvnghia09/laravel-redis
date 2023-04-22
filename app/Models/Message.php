<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['room', 'sender', 'content'];

    public function sender () {
        return $this->belongsTo(User::class, 'sender');
    }

    public function room () {
        return $this->belongsTo(Chatroom::class, 'room');
    }
}
