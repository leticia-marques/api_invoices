<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class InvoicesFilter extends ApiFilter {
    protected $safeParams = [
            'customer_id' => ['eq'],
            'amount' => ['eq', 'gt', 'lt', 'gte', 'lte'],
            'status' => ['eq', 'ne'],
            'billedDate' => ['eq', 'gt', 'lt', 'gte', 'lte'],
            'paidDate' => ['eq', 'gt', 'lt', 'gte', 'lte'],
    ];


    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date'
    ];

    protected $operatorMap = [
        'eq' => '=', 
        'gt' => '>', 
        'lt' => '<',
        'lte' => '<=',
        'gte' => '>=',
        'ne' => '!='
    ];

}