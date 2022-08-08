<?php

namespace Modules\Game\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $table = "game_player";

    protected $fillable = ['name','slug','competition_id','points'];

    protected static function newFactory()
    {
        return \Modules\Game\Database\factories\PlayerFactory::new();
    }

    /**
     * Set sluggable attribute
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    /**
     * The competition of player.
     */
    public function competition()
    {
        return $this->belongsTo('\Modules\Game\Entities\Competition','competition_id');
    }

    /**
     * The Competition logs
     */
    public function logs()
    {
        return $this->hasMany('\Modules\Game\Entities\Player','competition_id');
    }
}
