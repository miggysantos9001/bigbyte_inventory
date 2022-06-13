<?php
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DeliveredItemCaseExport implements FromView
{
    private $setting_name;
    private $setting_address;
    private $setting_contact;
	private $data;

    public function __construct(String $setting_name,String $setting_address,String $setting_contact,$data)
    {
        $this->setting_name = $setting_name;
        $this->setting_address = $setting_address;
        $this->setting_contact = $setting_contact;
        $this->data = $data;
    }

    public function view(): View
    {
        return view('admin.filters.generate-item', [
            'data' => $this->data,
            'setting_name' => $this->setting_name,
            'setting_address' => $this->setting_address,
            'setting_contact' => $this->setting_contact
        ]);
    }
}

?>