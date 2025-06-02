<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model{
    use HasFactory;

    protected $table = 'job_listings';

    /**
     * The attributes that are mass assignable.
     *
     */
    /*
    protected $fillable = [
        'employer_id',
        'title',
        'description',
        'location',
        'salary',
        'company'
    ];
    */

    protected $guarded = [];

    public function employer() {
        return $this->belongsTo(Employer::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'job_tag', 'job_id', 'tag_id');
    }
}
