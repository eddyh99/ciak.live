<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Live extends CI_Controller
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
            "title"     => NAMETITLE." - Live Today",
            "content"   => "admin/live/live-today",
            "mn_live"   => "active",
            "extra"     => "admin/live/js/_js_index"
        );

        $this->load->view('admin_template/wrapper', $data);
    }

    public function get_livetoday()
    {
        $result     = ciakadmin(URLAPI . "/v1/admin/member/getAllshow")->message;

        $newResult = array();
        foreach($result as $dt){
            
            $datetime = new DateTime($dt->start_date);
            $la_time = new DateTimeZone($_SESSION["time_location"]);
            $datetime->setTimezone($la_time);
            $temp_time = $datetime->format('Y-m-d H:i:s');

            $mdata = array(
                "id" => $dt->id,
                "id_member" => $dt->id_member,
                "start_date" => $temp_time,
                "price" => $dt->price,
                "meeting_type" => $dt->meeting_type,
                "purpose" => $dt->purpose,
                "duration" => $dt->duration,
                "roomid" => $dt->roomid,
                "username" => $dt->username
            );
            array_push($newResult, $mdata);
        }
        echo json_encode($newResult);
    }

    
}