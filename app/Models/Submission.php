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
 * Class Lesson
 *
 * @package App
// * @property string $course
 * @property string $title
 * @property text $description
 * @property integer $assignment_id
 * @property integer $user_id
 */
class Submission extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'assignment_id','user_id'];


    public static function boot()
    {
        parent::boot();
    }


    /**
     * Set to null if empty
     * @param $input
     */
    public function setAssignmentIdAttribute($input)
    {
        $this->attributes['assignment_id'] = $input ? $input : null;
    }

    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function attachmentsOrderById()
    {
        return $this->hasMany(Attachment::class)->orderBy('id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class)->orderBy('position');
    }

    public function suggestions()
    {
        return $this->hasMany(SuggestAttachment::class)->orderBy('a_group_id')->orderBy('created_at')->orderBy('position');
    }

    public function attachmentsById($user_id)
    {
        return $this->hasMany(Attachment::class)->where('user_id', '=', $user_id)->orderBy('position');
    }

    public function critiques()
    {
        return $this->morphMany('App\Models\Comment', 'reviewable');
    }

    public function critiquesById($user_id)
    {
        return $this->morphMany('App\Models\Comment', 'reviewable')->where('user_id', '=', $user_id)->orderBy('created_at');
    }
}
