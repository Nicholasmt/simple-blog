<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function posted_by()
    {
        return $this->belongsTo('App\Models\Admin', 'admin_id');
    }
}
