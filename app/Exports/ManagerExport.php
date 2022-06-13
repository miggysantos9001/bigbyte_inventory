<?php
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ManagerExport implements FromView
{
    private $date_from;
    private $date_to;
    private $setting_name;
    private $setting_address;
    private $setting_contact;
	private $data;
    private $manager;

    public function __construct(String $date_from,String $date_to,String $setting_name,String $setting_address,String $setting_contact,$data,String $manager)
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->setting_name = $setting_name;
        $this->setting_address = $setting_address;
        $this->setting_contact = $setting_contact;
        $this->data = $data;
        $this->manager = $manager;
    }

    public function view(): View
    {
        return view('admin.filters.manager', [
            'data' => $this->data,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'setting_name' => $this->setting_name,
            'setting_address' => $this->setting_address,
            'setting_contact' => $this->setting_contact,
            'manager' => $this->manager
        ]);
    }
}

?>