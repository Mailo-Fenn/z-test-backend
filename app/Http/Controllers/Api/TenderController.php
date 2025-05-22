<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use App\Http\Requests\StoreTenderRequest;
use App\Http\Requests\UpdateTenderRequest;

class TenderController extends Controller
{
    /**
     * Метод для получения всех тендеров
     */
    public function getAll($sortBy = '')
    {
        return match ($sortBy) {
            'date_asc'  => Tender::orderBy('update_time', 'asc')->get(),
            'name_asc'  => Tender::orderBy('name', 'asc')->get(),
            'date_desc' => Tender::orderBy('update_time', 'desc')->get(),
            'name_desc' => Tender::orderBy('name', 'desc')->get(),
            default     => Tender::all(),
        };
    }

    /**
     * Метод для получения одного тендера
     */
    public function getTender($extCode)
    {
        $tender = Tender::firstWhere('ext_code', $extCode);

        if ($tender) {
            return $tender;
        } else {
            abort(404);
        }
    }

    /**
     * Метод для создания тендера
     */
    public function create(StoreTenderRequest $request)
    {
        $nowDate = date('d.m.Y H:i:s');
        $request->merge([
           'update_time' => $nowDate,
        ]);
        
        return Tender::create($request->all());
    }
}
