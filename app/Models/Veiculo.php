<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    protected $table = "veiculo";
    protected $fillable = ['marca', 'tipo', 'modelo', 'versao'];

    public function dica () {
        return $this->hasMany(Dica::class);
    }
}
