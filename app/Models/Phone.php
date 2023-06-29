<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'device_model', 'capturePhoto', 'capturePhotoPos', 'captureAudio', 'captureAudioDuration', 'show_app'
    ];

}
