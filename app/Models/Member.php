<?php

namespace App\Models;

class Member extends PortalModel
{
    protected $hidden = ['current_governor_key'];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute(): ?string
    {
        if($this->media_id || !in_array($this->category?->slug,array_column(\App\Services\MemberDirectory::GROUPS,'slug'),true))return null;
        return \App\Services\MemberDirectory::portraitUrl();
    }
}
