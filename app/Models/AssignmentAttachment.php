<?php

namespace App\Models;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
//use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Support\Facades\File;
use Mtownsend\ReadTime\ReadTime;


/**
 * Class AssignmentAttachment
 *
 * @package App
// * @property string $course
 * @property string $title
 * @property string $slug
 * @property string $group_id
 * @property string $user_id
 * @property string $attach_file
 * @property string $attach_video
 * @property string $vimeo_id
 * @property string $youtube_id
 * @property text $full_text
 * @property integer $position
 * @property string $meta_title
 */
class AssignmentAttachment extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'attach_file', 'attach_video', 'vimeo_id', 'youtube_id',
        'full_text', 'position', 'published', 'group_id','user_id','meta_title', 'meta_description', 'meta_keywords'];


    public static function boot()
    {
        parent::boot();

    }


    /**
     * Set to null if empty
     * @param $input
     */
    public function setGroupIdAttribute($input)
    {
        $this->attributes['group_id'] = $input ? $input : null;
    }

    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }


    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPositionAttribute($input)
    {
        $this->attributes['position'] = $input ? $input : null;
    }

    public function group()
    {
        return $this->belongsTo(AssignmentAttachmentGroup::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'model');
    }

    public function chapterStudents()
    {
        return $this->morphMany(ChapterStudent::class, 'model');
    }

    public function downloadableMedia()
    {
        $types = ['youtube', 'vimeo', 'upload', 'embed', 'lesson_pdf', 'lesson_audio'];

        return $this->morphMany(Media::class, 'model')
            ->whereNotIn('type', $types);
    }


    public function mediaVideo()
    {
        $types = ['youtube', 'vimeo', 'upload', 'embed'];
        return $this->morphOne(Media::class, 'model')
            ->whereIn('type', $types);

    }

    public function mediaVimeo()
    {
        return $this->morphOne(Media::class, 'model')
            ->where('type', '=', 'vimeo');
    }

    public function mediaYoutube()
    {
        return $this->morphOne(Media::class, 'model')
            ->where('type', '=', 'youtube');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'reviewable');
    }
}
