<?php
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PurchaseExport implements FromView
{
    private $setting_name;
    private $setting_address;
    private $setting_contact;
    private $pdate;
    private $psup;
    private $premarks;
	private $data;

    public function __construct(String $setting_name,String $setting_address,String $setting_contact,String $pdate,String $psup,String $premarks,$data)
    {
        $this->setting_name = $setting_name;
        $this->setting_address = $setting_address;
        $this->setting_contact = $setting_contact;
        $this->pdate = $pdate;
        $this->psup = $psup;
        $this->premarks = $premarks;
        $this->data = $data;
    }

    public function view(): View
    {
        return view('admin.filters.purchase', [
            'data' => $this->data,
            'setting_name' => $this->setting_name,
            'setting_address' => $this->setting_address,
            'setting_contact' => $this->setting_contact,
            'pdate' => $this->pdate,
            'psup' => $this->psup,
            'premarks' => $this->premarks
        ]);
    }
}

?>