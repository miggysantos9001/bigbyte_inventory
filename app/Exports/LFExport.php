<?php
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LFExport implements FromView
{
    private $setting_name;
    private $setting_address;
    private $setting_contact;
	private $data;
    private $cs;

    public function __construct(String $setting_name,String $setting_address,String $setting_contact,$data,$cs)
    {
        $this->setting_name = $setting_name;
        $this->setting_address = $setting_address;
        $this->setting_contact = $setting_contact;
        $this->data = $data;
        $this->cs = $cs;
    }

    public function view(): View
    {
        return view('admin.filters.lf', [
            'data' => $this->data,
            'cs' => $this->cs,
            'setting_name' => $this->setting_name,
            'setting_address' => $this->setting_address,
            'setting_contact' => $this->setting_contact
        ]);
    }
}

?>