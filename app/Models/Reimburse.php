<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reimburse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['user', 'status'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%'.$search.'%')
              ->orWhere('detail', 'like', '%'.$search.'%');
        });   
        
        $query->when($filters['status'] ?? false, function($query, $status){
            return $query->whereHas('status', function($query) use ($status){
                $query->where('status', $status);
            });
        });
        
        $query->when($filters['user'] ?? false, fn($query, $user) =>
            $query->whereHas('user', fn($query) =>
                $query->where('username', $user)
            )
        ); 
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
