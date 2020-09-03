<?php

namespace App;

use Carbon\Carbon;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Job extends Model
{
    use HasSlug;
    use Searchable;

    public $asYouType = true;

    protected $with = ['category'];

    public function getSlugOptions() : SlugOptions{
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function toSearchableArray(){
        return [
             'id' => $this->id,
             'title' => $this->title,
             'location' => $this->location,
             'company' => $this->company
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'type',
        'location',
        'link_to_apply',
        'category_id',
        'salary',
        'company',
        'created_at',
        'approved'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
    ];

    public function scopeActive($query) {
        return $query->whereDate('created_at', '>=', Carbon::now()->subDays(30));
    }

    public function scopeExpired($query) {
        return $query->whereDate('created_at', '<', Carbon::now()->subDays(30));
    }

    public function expired($job) {
        if ($job->created_at < Carbon::now()->subDays(30)) {
            return true;
        }
    }

    public function expirationDate($job) {
        return Carbon::parse($job->created_at)->addDays(30)->format('d M Y');
    }

    public function scopeApproved($query) {
        return $query->where('approved', '=', true);
    }

    public function scopeUnapproved($query) {
        return $query->where('approved', '=', false);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function path() {
        return "/jobs/{$this->category->slug}/{$this->slug}";
    }

    public function editPath() {
        return "/jobs/{$this->category->slug}/{$this->access_token}/edit";
    }
}
