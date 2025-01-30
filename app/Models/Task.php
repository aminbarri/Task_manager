<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'priority',	
        'status',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
   
   
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
