<?php

namespace App\Services\Helpers;

use Illuminate\Support\Facades\Http;
use App\Exceptions\CustomException;



class DefaultPaginateService
{
    public function DefaultPaginate($content, $items)
    {
        return [
            'atualPage'         => $content->currentPage(),
            'totalRegisters'    => $content->total(),
            'totalPages'        => $content->lastPage(),
            'registersPerPage'  => $content->perPage(),
            'items'             => $items->items()
        ];
    }
}

