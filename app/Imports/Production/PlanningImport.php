<?php

namespace App\Imports\Production;

use App\Models\Batch;
use App\Models\Material;
use App\Models\ProductionLine;
use App\Models\ProductionPlan;
use App\Models\UnitOfMeasurements;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PlanningImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            $production_line    = ProductionLine::firstOrCreate(['name' => $row['prod_line']]);
            $material           = Material::firstOrCreate(['name' => $row['material'], 'description' => $row['material_description']]);
            $batch              = Batch::firstOrCreate(['name' => $row['batch']]);
            $uom                = UnitOfMeasurements::firstOrCreate(['name' => $row['uom']]);

            $basic_start_date = \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['bsc_start']));

            ProductionPlan::create([
                'production_line_id'    => $production_line->id,
                'material_id'           => $material->id,
                'batch_id'              => $batch->id,
                'unit_of_measurement_id'=> $uom->id,
                'order'                 => $row['order'],
                'target_qty'            => $row['target_qty'],
                'basic_start_date'      => $basic_start_date,
                'basic_start_time'      => $row['basicstart'],
                'logistic_text'         => $row['logistic_text'],
            ]);
        }
    }
}
