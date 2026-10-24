<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class Media extends PortalModel
{
    protected $table = 'media';

    protected $hidden = ['disk', 'path'];

    protected $appends = ['url'];

    public function getUrlAttribute(): ?string
    {
        return $this->visibility === 'public' ? Storage::disk('public')->url($this->path) : null;
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
