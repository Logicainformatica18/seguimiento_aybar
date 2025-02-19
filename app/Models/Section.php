<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'description','code','nivel','color', 'detail' ];
    
    public function user(){
        return $this->belongsTo(User::class,"updated_by");
    }
}
