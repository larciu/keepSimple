<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dica extends Model
{
    use HasFactory;
    protected $table = "dica";
    protected $fillable = ['veiculo_id', 'user_id', 'descricao'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function veiculo () {
        return $this->belongsTo(Veiculo::class);
    }
}
