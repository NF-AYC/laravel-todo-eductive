<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Todo;

class Tag extends Model
{
    use HasFactory;


    protected $fillable = ["name"];

    public function todos(): BelongsToMany
    {
        return $this->belongsToMany(Todo::class, 'tag_todo', 'tag_id', 'todo_id')->withPivot('index');
    }
}
