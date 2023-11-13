<?php
/*----------------------------------------------------------
    Modul Name  : Modul Meeting
    Desc        : Modul ini di gunakan untuk melakukan Live show,
                  Cam2Cam, Meeting Room
                  
    Sub fungsi  : 
    - showlive          : Menampilkan halaman sebelum dimulai live show
    - cekroom           : Validasi live show
    - showcam           : Menampilkan halaman sebelum dimulai Cam2Cam
    - cekroomcam        : Validasi Cam2Cam
    - showmeeting       : Menampilkan halaman sebelum dimulai Meeting Room
    - cekroommeeting    : Validasi Meeting Room
    - follower_search   : Searching member follower
    - inviteuser        : Invite member
------------------------------------------------------------*/ 
defined('BASEPATH') or exit('No direct script access allowed');

class Meeting extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }
	}


    public function showlive(){
        $rtmp   = apiciaklive(URLAPI . "/v1/member/perform/get_rtmp")->message;
        $data = array(
            'title'         => NAMETITLE . ' - Meeting',
            'rtmp'          => $rtmp,
            'content'       => 'apps/member/posting/meeting/app-live-show',
            'extra'         => 'apps/member/posting/meeting/js/js-liveshow',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function cekroom(){
        $room_id   = $this->security->xss_clean($this->input->post("room"));
        $detail = apiciaklive(URLAPI . "/v1/member/perform/getdata_byroom?room_id=".$room_id)->message;

        $to_time    = strtotime(date("Y-m-d H:i:s"));
        $from_time  = strtotime($detail->start_date);
        $selisih    = round(abs($to_time - $from_time) / 60);
 
        if ($_SESSION["user_id"]==$detail->id_member){
            if ($selisih<-15){
                header("HTTP/1.0 403 Forbidden");
                echo "You can't open chat room yet, please start 15 minutes before";
                return;
            }elseif ($selisih>15){
                header("HTTP/1.0 403 Forbidden");
                echo "Room link has been expired, please create another";
                return;
            }
        }
        
        $data=array(
                "performer"     => ($detail->id_member==$_SESSION["user_id"]) ? true : false,
                "username"      => ($detail->id_member==$_SESSION["user_id"]) ? $detail->username : $_SESSION["username"],
                "meeting_type"  => $detail->meeting_type,
                "purpose"       => $detail->purpose
            );
        echo json_encode($data);
    }
    
    public function showcam(){
       $data = array(
            'title'         => NAMETITLE . ' - Meeting',
            'content'       => 'apps/member/posting/meeting/app-showcam',
            'extra'         => 'apps/member/posting/meeting/js/js-showcam',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function cekroomcam(){
        $room_id   = $this->security->xss_clean($this->input->post("room"));
        $detail = apiciaklive(URLAPI . "/v1/member/perform/getdata_byroom?room_id=".$room_id)->message;

        if ($detail->id_member!=$_SESSION["user_id"]){
            $guest = apiciaklive(URLAPI . "/v1/member/perform/getmember_byroom?room_id=".$room_id."&to_id=".$_SESSION["user_id"])->message;
            if (empty($guest)){
                header("HTTP/1.0 403 Forbidden");
                echo "You are not allowed to join this room";
                return;
            }
        }
        
        $to_time    = strtotime(date("Y-m-d H:i:s"));
        $from_time  = strtotime($detail->start_date);
        $selisih    = round(abs($to_time - $from_time) / 60);

        if ($_SESSION["user_id"]==$detail->id_member){
            if ($selisih<-15){
                header("HTTP/1.0 403 Forbidden");
                echo "You can't open chat room yet, please start 15 minutes before";
                return;
            }elseif ($selisih>15){
                header("HTTP/1.0 403 Forbidden");
                echo "Room link has been expired, please create another";
                return;
            }
        }
        
        $data=array(
            "performer" => ($detail->id_member==$_SESSION["user_id"]) ? true : false,
            "username"  => ($detail->id_member==$_SESSION["user_id"]) ? $detail->username : $_SESSION["username"]
        );
        echo json_encode($data);
    }

    public function showmeeting(){
        $following   = apiciaklive(URLAPI . "/v1/member/follow/getlist_follower")->message;

        $data = array(
            'title'         => NAMETITLE . ' - Meeting',
            'content'       => 'apps/member/posting/meeting/app-meeting-room',
            'extra'         => 'apps/member/posting/meeting/js/js-showmeeting',
            'following'     => $following
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function cekroommeeting(){
        $room_id   = $this->security->xss_clean($this->input->post("room"));
        $detail = apiciaklive(URLAPI . "/v1/member/perform/getdata_byroom?room_id=".$room_id)->message;

        if ($detail->id_member!=$_SESSION["user_id"]){
            $guest = apiciaklive(URLAPI . "/v1/member/perform/getmember_byroom?room_id=".$room_id."&to_id=".$_SESSION["user_id"])->message;
            if (empty($guest)){
                $public = apiciaklive(URLAPI . "/v1/member/perform/getpublic_byroom?room_id=".$room_id)->message;
                if (empty($public)){
                    header("HTTP/1.0 403 Forbidden");
                    echo "This is private meeting";
                    return;
                }
            }
        }
        
        $to_time    = strtotime(date("Y-m-d H:i:s"));
        $from_time  = strtotime($detail->start_date);
        $selisih    = round(abs($to_time - $from_time) / 60);

        if ($_SESSION["user_id"]==$detail->id_member){
            if ($selisih<-15){
                header("HTTP/1.0 403 Forbidden");
                echo "You can't open chat room yet, please start 15 minutes before";
                return;
            }elseif ($selisih>15){
                header("HTTP/1.0 403 Forbidden");
                echo "Room link has been expired, please create another";
                return;
            }
        }
        
        $data=array(
                "performer" => ($detail->id_member==$_SESSION["user_id"]) ? true : false,
                "username"  => ($detail->id_member==$_SESSION["user_id"]) ? $detail->username : $_SESSION["username"]
            );
        if (!empty($public)){
            $data=array(
                "performer" => ($detail->id_member==$_SESSION["user_id"]) ? true : "public",
                "username"  => ($detail->id_member==$_SESSION["user_id"]) ? $detail->username : $_SESSION["username"]
            );
        }
        echo json_encode($data);
    }
    
    public function follower_search(){
        $term=$this->security->xss_clean($_GET["term"]);
        $roomid=$this->security->xss_clean($_GET["room_id"]);

        $url = URLAPI . "/v1/member/follow/get_searchfollower?term=".$term;
        $result = @apiciaklive($url)->message;

        $data['search'] = $result;
        $data["roomid"] = $roomid;
        $this->load->view('apps/member/posting/meeting/app-profile-result', $data);
    }
    
    public function inviteuser(){
        $room_id    = $this->security->xss_clean($_GET["room"]);
        $detail     = apiciaklive(URLAPI . "/v1/member/perform/getchat_byroom?room_id=".$room_id)->message;
        
        $guestid=$this->security->xss_clean($_GET["guestid"]);
        $post_time=date("Y-m-d H:i");
        $mdata=array(
                "to_user_id"    => $guestid,
                "from_user_id"  => $_SESSION["user_id"],
                "chat_message"  => $detail->chat_message,
                "timestamp"     => $post_time,
                "roomid"        => $room_id
            );

        $url = URLAPI . "/v1/member/perform/invitemmeeting";
		$result = apiciaklive($url,json_encode($mdata));
        
		if (@$result->code!=200){
		    //set flash data error
	        return;
		}else{
		    return true;
		}
    }
}