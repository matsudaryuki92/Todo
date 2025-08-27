<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    //castsを使うことでstring->Carbonの型に変換することが出来る
    protected $casts = [
        'deadline' => 'datetime',
    ];

    protected $fillable = [
        'category_id',
        'contents',
        'completed',
        'deadline',
        'created_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
