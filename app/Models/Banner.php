<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;

    public function creatorName()
    {
       return$this->belongsTo(User::class,'ban_creator','id');
    }

    public function editorName()
    {
       return$this->belongsTo(User::class,'ban_editor','id');
    }
}
