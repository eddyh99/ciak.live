<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;


class Topup extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('user_id'))) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$data = array(
			"title"     => NAMETITLE ." - Ciak Topup",
			"content"   => "admin/operations/ciaktopup",
			"mn_op"     => "active",
		);

		$this->load->view('admin_template/wrapper', $data);
	}
	
	public function ciakimport(){
	    $file_mimes = array('text/csv');
        if(isset($_FILES['topup']['name']) && in_array($_FILES['topup']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['topup']['name']);
            $extension = end($arr_file);
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }
        $spreadsheet = $reader->load($_FILES['topup']['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $array = array_map('array_filter', $sheetData);
        $array = array_filter($array);
        $input = array_map("unserialize", array_unique(array_map("serialize", $array)));
		

        $i=0;
        $mdata = array();
        foreach ($input as $dt){
            $i++;
            if ($i==1) continue;
            if (strtolower(substr($dt[0], 0, 8)) == strtolower("TRANSFER")) {

				
				if (!empty($dt[4])) {
					
					$temp["admin_id"] = 1;
                    if (strtolower(substr($dt[4],0,4))=="rcpt"){
					    $temp["wise_id"] = substr($dt[0], -8);
					    $temp["causal"] = substr($dt[4],0,10);
						$temp["currency"] = $dt[2];
						if ($dt[3]=="USD"){
							$temp["amount"] = $dt[1]-$dt[18];
						}else{
						    $temp["amount"] = $dt[1];
						}
    				    $temp["is_proses"]='yes';
    					array_push($mdata, $temp);
					}
				}
            }
        }
        
        $result = ciakadmin(URLAPI . "/v1/trackless/operations/topup", json_encode($mdata));
		if ($result->code != 200) {
			$this->session->set_flashdata('failed', $result->message);
			redirect("godmode/topup");
			return;
		}

		$this->session->set_flashdata('success', $result->message);
		redirect("godmode/topup");
		return;
	}
/*
	public function ciakimport()
	{
		$file = $_FILES['topup']['tmp_name'];
		// Medapatkan ekstensi file csv yang akan diimport.
		$ekstensi  = explode('.', $_FILES['topup']['name']);

		// Tampilkan peringatan jika submit tanpa memilih menambahkan file.
		if (empty($file)) {
			$this->session->set_flashdata("error", "File can't be empty");
			redirect("godmode/topup");
			return;
		} else {
			// Validasi apakah file yang diupload benar-benar file csv.
			if (strtolower(end($ekstensi)) === 'csv' && $_FILES["topup"]["size"] > 0) {

				$i = 0;
				$mdata = array();
				$handle = fopen($file, "r");
				while (($dt = fgetcsv($handle, 2048, ","))) {
					$i++;
					if ($i == 1) continue;
					print_r($dt);
					die;
					//$xx=explode(",",$dt[0]);
					if (strtolower(substr($dt[0], 0, 8)) == strtolower("TRANSFER")) {
						if (!empty($dt[5])) {
						    
							$temp["admin_id"] = 1;
							if (strtolower(substr($dt[5], 0, 2)) == strtolower("sc")){
							    $temp["ucode"] = substr($dt[5],2,8);
    							$temp["wise_id"] = substr($dt[0], -9);
    							$temp["currency"] = $dt[3];
    							if ($dt[3]=="USD"){
        							$temp["amount"] = $dt[2]-$dt[18];
    							}else{
    							    $temp["amount"] = $dt[2];
    							}
							}elseif (strtolower(substr($dt[5],0,4))=="rcpt"){
							    $temp["wise_id"] = substr($dt[0], -9);
							    $temp["causal"] = substr($dt[5],0,10);
    							$temp["currency"] = $dt[3];
    							if ($dt[3]=="USD"){
        							$temp["amount"] = $dt[2]-$dt[18];
    							}else{
    							    $temp["amount"] = $dt[2];
    							}
							}
						    $temp["is_proses"]='yes';
							array_push($mdata, $temp);
						}
					}
				}
				fclose($handle);
			} else {
				$this->session->set_flashdata("error", "Wrong file format");
				redirect("godmode/topup");
				return;
			}
		}
		
		$result = ciakadmin(URLAPI . "/v1/trackless/operations/topup", json_encode($mdata));

		if ($result->code != 200) {
			$this->session->set_flashdata('failed', $result->message);
			redirect("godmode/topup");
			return;
		}

		$this->session->set_flashdata('success', $result->message);
		redirect("godmode/topup");
		return;
	}*/
}