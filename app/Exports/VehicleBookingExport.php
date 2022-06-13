<?php
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VehicleBookingExport implements FromView
{
    private $monthName;
    private $year_id;
    private $setting_name;
    private $setting_address;
    private $setting_contact;
	private $data;

    public function __construct(String $monthName,String $year_id,String $setting_name,String $setting_address,String $setting_contact,$data)
    {
        $this->monthName = $monthName;
        $this->year_id = $year_id;
        $this->setting_name = $setting_name;
        $this->setting_address = $setting_address;
        $this->setting_contact = $setting_contact;
        $this->data = $data;
    }

    public function view(): View
    {
        return view('admin.filters.vehicle-booking', [
            'data' => $this->data,
            'monthName' => $this->monthName,
            'year_id' => $this->year_id,
            'setting_name' => $this->setting_name,
            'setting_address' => $this->setting_address,
            'setting_contact' => $this->setting_contact
        ]);
    }
}

?>