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

    public function getIsOverdueAttribute()
    {
        //isPast()・Carbonのメソッドで、現在日時より過去かどうかを判定。過去ならtrue、まだならfalseを返します。
        //&&両方の条件を満たさないといけない、今日を含む過去の日程+今日は省いた日＝今日より前の日
        return $this->deadline->isPast() && !$this->deadline->isToday();
    }
}
