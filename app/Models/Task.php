<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Task extends Model {

    use HasFactory;

    protected $table = 'tasks';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'string';

    protected $fillable = [
        'task_date',
        'title',
        'description',
        'due_date',
        'user_id',
        'status_id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'task_date' => 'datetime',
        'due_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getTaskId(){

        return $this->attributes['id'] ?? '#Auto#';
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }


}
