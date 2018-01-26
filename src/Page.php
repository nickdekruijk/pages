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

    // If slug is empty create slug based on title
    public function getSlugAttribute($value)
    {
        // If slug is / then it's the 'root' so return empty slug
        if ($value == '/') {
            return '';
        }
        return $value ?: str_slug($this->title);
    }

    // If empty set html_title based on title and APP_NAME
    public function getHtmlTitleAttribute($value)
    {
        return $value ?: $this->title . ' - ' . env('APP_NAME');
    }
}
