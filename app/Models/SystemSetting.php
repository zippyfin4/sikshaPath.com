<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SystemSetting extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'data',
        'type',
    ];

    public $timestamps = false;
    // protected $connection = 'mysql';

    public function getDataAttribute($value) {
        // Only apply URL transformation for file types when accessing, not when saving
        if (isset($this->attributes['type']) && $this->attributes['type'] == 'file' && $value) {
            // Check if it's already a full URL
            if (filter_var($value, FILTER_VALIDATE_URL)) {
                return $value;
            }
            // Convert storage path to URL
            return url(Storage::url($value));
        }

        return $value;
    }

    // Add a method to get raw data without accessor
    public function getRawData() {
        return $this->attributes['data'] ?? null;
    }

}
