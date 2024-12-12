<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'operations';


    protected $fillable = [
        'nom_prenom',
        'npp_nni',
        'nationalite',
        'destination',
        'motif_voyage',
        'num_billet',
        'residence',
        'devise_code',
        'nature',
        'montant',
        'cours',
        'cv_en_num',
        'commission',
        'net_a_payer',
        'date_operation',
    ];
}
