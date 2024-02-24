<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BILLINGDOC_ITEM extends Model
{
    protected $table = 'BILLINGDOC_ITEM';
    protected $primaryKey = 'BILLINGDOCUMENT'; 
    public $timestamps=false;
    protected $fillable = [
        'ID',
        'BILLINGDOCUMENT', //linkreff
        'BILLINGDOCUMENTITEM',
        'MATERIAL',
        'PRODUCT',
        'BILLINGDOCUMENTITEMTEXT',
        'BILLINGQUANTITY',
        'BILLINGQUANTITYUNIT',
        'SHIPPINGPOINT',
    ];
}
