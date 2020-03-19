<?php

namespace App\Exports;

use App\Balance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BalanceExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $collected_by;

    function __construct($collector) {
        $this->collected_by = $collector;
    }

    public function collection()
    {
        return Balance::where([
            ['collected_by','like',"%".$this->collected_by."%"],
            ['collected_date','=',today()],
        ])->get(['collected_by','deposited_amount','collected_date','client_name']);
    }

    public function headings(): array
    {
        return [
          '-----Collector-----',
          '-----Amount------',
          '-------Collected Date----',
          '------Client------',
        ];
    }
}
