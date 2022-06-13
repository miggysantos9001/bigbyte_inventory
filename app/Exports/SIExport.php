<?php

namespace App\Exports;

use App\Si_receipt_payment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SIExport implements FromView
{
   	private $data;
    private $setting_name;
    private $setting_address;
    private $setting_contact;

    public function __construct($data,$setting_name,$setting_address,$setting_contact)
    {
        $this->data = $data;
        $this->setting_name = $setting_name;
        $this->setting_address = $setting_address;
        $this->setting_contact = $setting_contact;
    }

    public function view(): View
    {
        return view('admin.filters.siexport', [
            'data' => $this->data,
            'setting_name' => $this->setting_name,
            'setting_address' => $this->setting_address,
            'setting_contact' => $this->setting_contact

        ]);
    }
}
