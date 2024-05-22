<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{

    use HasFactory;

    protected $table = 'assign';

    protected $fillable = [
        'student_id',
        'game_id',
    ];

    /**
     * Relationships
     */
    public function Game()
    {
        return $this->belongsTo(Game::class, 'id');
    }
    public function User()
    {
        return $this->belongsTo(Student::class, 'id');
    }
}
