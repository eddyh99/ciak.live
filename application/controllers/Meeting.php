<?php
/*----------------------------------------------------------
    Modul Name  : Modul Meeting
    Desc        : Modul ini di gunakan untuk melakukan Live show,
                  Cam2Cam, Meeting Room
                  
    Sub fungsi  : 
    - showlive          : Tampilan halaman sebelum dimulai live show
    - cekroom           : Proses Validasi live show
    - showcam           : Tampilan halaman sebelum dimulai Cam2Cam
    - cekroomcam        : Proses Validasi Cam2Cam
    - showmeeting       : Tampilan halaman sebelum dimulai Meeting Room
    - cekroommeeting    : Proses Validasi Meeting Room
    - confirmjoin       : Proses Join 
    - follower_search   : Proses Searching member follower
    - inviteuser        : Proses Invite member
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
        $room_id = $_GET['room_id'];
        $room = apiciaklive(URLAPI . "/v1/member/perform/getdata_byroom?room_id=".$room_id)->message;
        $follower   = apiciaklive(URLAPI . "/v1/member/follow/getlist_follower")->message;
        $content_type = apiciaklive(URLAPI . "/v1/member/perform/getpublic_byroom?room_id=".$room_id)->message;

        $data = array(
            'title'         => NAMETITLE . ' - Meeting',
            'rtmp'          => $rtmp,
            'room'          => $room,
            'content_type'  => $content_type,
            'follower'      => $follower,
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
            'id_has_room'   => $detail->id_member, 
            "performer"     => ($detail->id_member==$_SESSION["user_id"]) ? true : false,
            "username"      => ($detail->id_member==$_SESSION["user_id"]) ? $detail->username : $_SESSION["username"],
            "meeting_type"  => $detail->meeting_type,
            "purpose"       => $detail->purpose,
            "price"         => $detail->price
        );
        echo json_encode($data);
    }
    
    public function showcam(){
        $room_id = $_GET['room_id'];
        $content_type = apiciaklive(URLAPI . "/v1/member/perform/getpublic_byroom?room_id=".$room_id)->message;

        $data = array(
            'title'         => NAMETITLE . ' - Meeting',
            'content_type'  => $content_type,
            'content'       => 'apps/member/posting/meeting/app-showcam',
            'extra'         => 'apps/member/posting/meeting/js/js-showcam',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function cekroomcam(){
        $room_id   = $this->security->xss_clean($this->input->post("room"));
        $detail = apiciaklive(URLAPI . "/v1/member/perform/getdata_byroom?room_id=".$room_id)->message;
        if ($detail->id_member!=$_SESSION["user_id"]){
            $guest = apiciaklive(URLAPI . "/v1/member/perform/getmember_byroom?room_id=".$room_id."&from_id=".$detail->id_member)->message;
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
            "username"  => ($detail->id_member==$_SESSION["user_id"]) ? $detail->username : $_SESSION["username"],
            "price"     => $detail->price
        );
        
        echo json_encode($data);
    }

    public function showmeeting(){
        $following   = apiciaklive(URLAPI . "/v1/member/follow/getlist_follower")->message;
        $room_id = $_GET['room_id'];
        $guest = apiciaklive(URLAPI . "/v1/member/perform/getmember_byroom?room_id=".$room_id."&from_id=1")->message;
        $public = apiciaklive(URLAPI . "/v1/member/perform/getpublic_byroom?room_id=".$room_id)->message;
        $allguest = apiciaklive(URLAPI . "/v1/member/perform/getguest?room_id=".$room_id)->message;
        
        
        $nonguest = array();
        foreach($following as $dt){
            $temp_ufollowing = $dt->username;
            $flag_guest = false;

            foreach($allguest as $dta){
                $temp_uguest = $dta->username;
                if($temp_ufollowing == $temp_uguest){
                    $flag_guest = true;
                }
            }

            if($flag_guest == false){
                array_push($nonguest, (object)[
                    'id'        => $dt->id,
                    'username'  => $dt->username,
                    'profile'   => $dt->profile,
                    'ucode'     => $dt->ucode,
                    'is_follow' => $dt->is_follow,
                ]);
            }
        }


        $data = array(
            'title'         => NAMETITLE . ' - Meeting',
            'content'       => 'apps/member/posting/meeting/app-meeting-room',
            'extra'         => 'apps/member/posting/meeting/js/js-showmeeting',
            'following'     => $following,
            'nonguest'      => $nonguest,
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function cekroommeeting(){
        $room_id   = $this->security->xss_clean($this->input->post("room"));
        $detail = apiciaklive(URLAPI . "/v1/member/perform/getdata_byroom?room_id=".$room_id)->message;

        if ($detail->id_member!=$_SESSION["user_id"]){
            $guest = apiciaklive(URLAPI . "/v1/member/perform/getmember_byroom?room_id=".$room_id."&from_id=".$detail->id_member)->message;
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
    
    public function confirmjoin(){
        $room_id    = $this->security->xss_clean($this->input->post("room"));

        $balance    = apiciaklive(URLAPI . "/v1/member/wallet/getBalance?currency=USDX&userid=" . $_SESSION["user_id"])->message->balance;
        $detail     = apiciaklive(URLAPI . "/v1/member/perform/getdata_byroom?room_id=".$room_id)->message;

        if ($detail->price>$balance){
            header("HTTP/1.0 403 Forbidden");
            echo "Insufficient USDX Balance";
            return;
        }
        
        $url = URLAPI . "/v1/member/perform/confirm_join?room_id=".$room_id;
        $result = @apiciaklive($url);
        if (@$result->code!=200){
            header("HTTP/1.0 403 Forbidden");
            echo $result->message;
            return;
        }
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
        $guestid = $this->security->xss_clean($_GET["guestid"]);


        $post_time=date("Y-m-d H:i");
        if (empty($detail)){
            $message="You Are Invited to join meeting";
            $message.="<br>Description : ".$deskripsi;

            $mdata=array(
                "to_user_id"    => $guestid,
                "from_user_id"  => $_SESSION["user_id"],
                "chat_message"  => $message,
                "timestamp"     => $post_time,
                "roomid"        => $room_id
            );
        }else{
            $mdata=array(
                "to_user_id"    => $guestid,
                "from_user_id"  => $_SESSION["user_id"],
                "chat_message"  => $detail->chat_message,
                "timestamp"     => $post_time,
                "roomid"        => $room_id
            );
        }
        
            
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