<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documents;
class AboutMe extends Model
{
    use HasFactory;
    protected $fillable = ['title_en', 'about_me_en','about_me_ar','stay_social_ar','stay_social_en','insta_url','snapchat_url','tiktok_url','youtube_url'];
    public function documents()
    {
        return $this->morphMany(Documents::class, 'documentable');
    }
}
