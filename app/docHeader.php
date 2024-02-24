<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docHeader extends Model
{
    protected $table = 'docHeader';
    protected $primaryKey = 'ID'; 
    public $timestamps=false;
    protected $fillable = [
        
        'MANDT',
        'BILLINGDOCUMENT',
        'CREATEDBYUSER',
        'CREATIONDATE',
        'CREATIONTIME',
        'SALESORGANIZATION',
        'DISTRIBUTIONCHANNEL',
        'DIVISION',
        'PAYERPARTY',
        'DOCUMENTREFERENCEID',
    ];

    public function billingDocItems()
    {
        return $this->hasMany(BILLINGDOC_ITEM::class, 'BILLINGDOCUMENT', 'BILLINGDOCUMENT');
    }
}
