<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'catid';

    public function sopFiles()
    {
        return $this->hasMany(File::class, 'catid', 'catid');
    }
}
