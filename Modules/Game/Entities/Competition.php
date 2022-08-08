<?php

namespace Modules\Game\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Competition extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $table = "game_competition";

    protected $fillable = ['name','slug','players_number','is_active'];

    protected static function newFactory()
    {
        return \Modules\Game\Database\factories\CompetitionFactory::new();
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
     * The Competition players
     */
    public function players()
    {
        return $this->hasMany('\Modules\Game\Entities\Player','competition_id');
    }

    /**
     * The Competition logs
     */
    public function logs()
    {
        return $this->hasMany('\Modules\Game\Entities\Player','competition_id');
    }

    /*
     * Attributes
     */
    public function getNrOfPlayersAttribute()
    {
        $nr = 0;
        if ($this->players)
            $nr = $this->players->count();

        return $nr;
    }

    /*
     * Scopes
     */

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOfActive($query)
    {
        $query->where('is_active',1);

        return $query;
    }
}
