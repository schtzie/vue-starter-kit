<?php

namespace App\Traits\Profile;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasProfileAvatar
{
    /**
     * Get the URL to the user's profile photo.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function profileAvatar(): Attribute
    {
        return Attribute::get(function (): string {
            return $this->defaultProfilePhotoUrl();
        });
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl(): string
    {
        return trim(collect(explode(' ', $this->name))
            ->map(function ($segment) {
                return mb_substr($segment, 0, 1);
            })
            ->join(''));
    }
}
