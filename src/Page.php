<?php

namespace LaraPages\Pages;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $casts = [
        'active' => 'boolean',
        'menuitem' => 'boolean',
        'home' => 'boolean',
        'date' => 'date',
    ];

    public function getSlugAttribute($value)
    {
        return $value ?: str_slug($this->title);
    }
}
