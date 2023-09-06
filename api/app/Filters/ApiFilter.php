<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter {
    protected $safeParams = [];


    protected $columnMap = [];

    protected $operatorMap = [];

    public function transform(Request $request){ 
        $eloQuery = [];

        foreach($this->safeParams as $parm => $operators) {
            $query = $request->query($parm);
           
            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;
            
            // dump($operators);
            foreach($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }


}