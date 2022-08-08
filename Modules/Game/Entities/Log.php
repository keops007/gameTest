<?php

namespace Modules\Game\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "game_competition_player_log";

    protected $fillable = ['competition_id','players_id','points'];

    protected static function newFactory()
    {
        return \Modules\Game\Database\factories\LogFactory::new();
    }

    /**
     * The competition of player.
     */
    public function competition()
    {
        return $this->belongsTo('\Modules\Game\Entities\Competition','competition_id');
    }

    /**
     * The competition of player.
     */
    public function player()
    {
        return $this->belongsTo('\Modules\Game\Entities\Player','players_id');
    }
}
