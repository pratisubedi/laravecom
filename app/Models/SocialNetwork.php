<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    use HasFactory;
    protected $fillable = [
        "facebook_url",
        "youtube_url",
        "instagram_url",
        "linkedin_url",
        "twitter_url",
        "github_url"
    ] ;
}
