<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\BILLINGDOC_ITEM;
use App\docHeader;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
{
    $billingItems = BILLINGDOC_ITEM::take(10)
        ->select('ID', 'BILLINGDOCUMENT', 'BILLINGDOCUMENTITEM', 'MATERIAL', 'PRODUCT', 'BILLINGDOCUMENTITEMTEXT', 'BILLINGQUANTITY', 'BILLINGQUANTITYUNIT', 'SHIPPINGPOINT')
        ->get();
    
    return response()->json($billingItems);
}



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //s
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

public function show($billingDocument)
{
    // Retrieve the billing items
    $billingItems = BILLINGDOC_ITEM::where('BILLINGDOCUMENT', $billingDocument)
        ->select('ID', 'BILLINGDOCUMENT', 'BILLINGDOCUMENTITEM', 'MATERIAL', 'PRODUCT', 'BILLINGDOCUMENTITEMTEXT', 'BILLINGQUANTITY', 'BILLINGQUANTITYUNIT', 'SHIPPINGPOINT')
        ->get();
    
    // Retrieve the corresponding docHeader
    $docHeader = docHeader::where('BILLINGDOCUMENT', $billingDocument)
        ->select('MANDT', 'BILLINGDOCUMENT', 'CREATEDBYUSER', 'CREATIONDATE', 'CREATIONTIME', 'SALESORGANIZATION', 'DISTRIBUTIONCHANNEL', 'DIVISION', 'PAYERPARTY','DOCUMENTREFERENCEID')
        ->get();
 
    // Convert collections to arrays
    $billingItemsArray = $billingItems->toArray();
    $docHeaderArray = $docHeader->toArray();
 
    // Merge the arrays
    $mergedArray = array_merge($billingItemsArray, $docHeaderArray);

    // Convert merged array to JSON
    $jsonResult = json_encode($mergedArray);
    
    // Return the JSON value
    return $jsonResult;
}

     
     
     


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
