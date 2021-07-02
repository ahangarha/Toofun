<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'token';
    protected $keyType = 'string';

    public function isOpen()
    {
        return $this->created_at > Carbon::now()->subHours($this->duration);
    }

    public function openFor()
    {
        $createdAt = new Carbon($this->created_at);
        return $createdAt->addHours($this->duration)->diffForHumans();
    }

    public function expiresIn()
    {
        $createdAt = new Carbon($this->created_at);
        return $createdAt->addDays(7)->diffForHumans();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
