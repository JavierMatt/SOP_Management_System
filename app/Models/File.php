<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'filename', 'catid', 'version', 'path', 'userid'
    ];
    protected $primaryKey = 'fileID';

    public function category()
    {
        return $this->belongsTo(Category::class, 'catid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
    
}
