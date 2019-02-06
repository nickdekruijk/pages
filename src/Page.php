<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use NickDeKruijk\Admin\Images;

class Page extends Model
{
    use Images;

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

    // If empty set head based on title
    public function getHeadAttribute($value)
    {
        return $value ?: $this->title;
    }
}
