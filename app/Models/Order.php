<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menuId', 'id');
    }

    public function userData()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}