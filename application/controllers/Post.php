<?php
/*----------------------------------------------------------
    Modul Name  : Modul Post
    Desc        : Modul ini di gunakan upload post dari user
                  

    Sub fungsi  : 
      - upload_image    : berfungsi untuk mengedit single image
      - upload_images   : berfungsi untuk mengedit multiple image
      - upload_process  : berfungsi untuk memproses hasil image 
                          yang akan diupload



        
------------------------------------------------------------*/ 
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }
	}

    public function index()
    {
        if (@$_GET["type"]=="explicit"){
            $_SESSION["content_type"]='explicit';
        }else{
            $_SESSION["content_type"]='non explicit';
        }

        $url = URLAPI . "/v1/member/profile/getProfile?userid=".$_SESSION["user_id"];
		$result = apiciaklive($url)->message;
        $following   = apiciaklive(URLAPI . "/v1/member/follow/getlist_following")->message;
        // $vsdata = $this->session->flashdata('vs_data');

        // echo "<pre>".print_r($vsdata,true)."</pre>";
        // die;

        $data = array(
            'title'         => NAMETITLE . ' - Post',
            'profile'       => $result,
            'following'     => $following,
            // 'stitch'        => $vsdata,                 
            'content'       => 'apps/member/posting/app-posting',
            'cssextra'      => 'apps/member/posting/css/_css_index',
            'extra'         => 'apps/member/posting/js/_js_index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }


    public function upload_images()
    {
        $data = array(
            'title'         => NAMETITLE . ' - Post',
            'content'       => 'apps/member/posting/upload/app-upload-multiple',
            'cssextra'      => 'apps/member/posting/css/_css_index',
            'extra'         => 'apps/member/posting/js/_js_upload_multiple',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }


    
    function addhttp($matches) {
    	if (!preg_match("~^(?:f|ht)tps?://~i", $matches[0])) {
            $url = "https://" . $matches[0];
        }else{
        	$url =$matches[0];
        }
        $link='<a href="'.$url.'" class="link" target="_blank" title="'.$url.'">'.$url.'</a>';
        return $link;
      //return $matches[0] . '(' . strlen($matches[0]) . ')';
    }
    
    public function savepost(){
        $input  = $this->input;
        $post   = $this->security->xss_clean($this->input->post("post"));
        $tipe   = $this->security->xss_clean($this->input->post("tipe"));
        $price  = $this->security->xss_clean($this->input->post("price"));
        $files  = @$_FILES['image'];
        $video  = @$_FILES['video'];
        $attach  = @$_FILES['attach'];
        // $id_stitch  = $this->security->xss_clean($this->input->post("stitch"));


        $is_attach_gbr="no";
        if (!empty($files)){
            $is_attach_gbr="yes";
            $attach_type="image";
            $blob=array();
            foreach ($files['name'] as $key => $image) {
                $temp   = curl_file_create($files['tmp_name'][$key],$files['type'][$key]);
                array_push($blob, $temp);
            }
        }
        
        $is_attach_video="no";
        if (!empty($video)){
            $is_attach_video="yes";
            $attach_type="video";
            $blob=array();
            foreach ($video['name'] as $key => $image) {
                $temp   = curl_file_create($video['tmp_name'][$key],$video['type'][$key]);
                array_push($blob, $temp);
            }
        }

        $is_attach="no";
        if (!empty($attach)){
            $is_attach="yes";
            $attach_type="attach";
            $blob=array();
            foreach ($attach['name'] as $key => $image) {
                $temp   = curl_file_create($attach['tmp_name'][$key],$attach['type'][$key]);
                array_push($blob, $temp);
            }
        }
        

        if ($is_attach=="no" && $is_attach_gbr=="no" && $is_attach_video=="no" && empty($post)){
     	     $message=array(
	            "success"   => false,
	            "message"   => "No Post Content"
	        );
	        echo json_encode($message);
	        return;
        }

        
        //convert url to clickable



        $pattern = '/((ftp|http|https):\/\/)?([\w_-]+(?:(?:\.[\w_-]+)+))([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])/';
        $post = preg_replace_callback($pattern, function($matches){
                    if (!preg_match("~^(?:f|ht)tps?://~i", $matches[0])) {
                        $url = "https://" . $matches[0];
                    }else{
                    	$url =$matches[0];
                    }
                    $link='<a href="'.$url.'" class="link" target="_blank" title="'.$url.'">'.$url.'</a>';
                    return $link;
                }, $post);
        //$post=preg_replace('/((ftp|http|https):\/\/)?([\w_-]+(?:(?:\.[\w_-]+)+))([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])/', '<a href="$0" target="_blank" title="$0">$0</a>', $post);
        $mdata=array(
                "article"       => $post,
                "type"          => $tipe,
                "price"         => $price,
                "attach_type"   => @$attach_type,
                // "id_stitch"     => (!empty($id_stitch)) ? $id_stitch : null,
                "content"       => @$blob,
                "content_type"  => $_SESSION["content_type"]
            );
        

    	$url = URLAPI . "/v1/member/post/add";
		$result = apiciaklive($url,json_encode($mdata));
		if (@$result->code!=200){
		    $message=array(
	            "success"   => false,
	            "message"   => $result
	        );
	        echo json_encode($message);
	        return;
		}
		 $message=array(
	            "success"   => true,
	            "message"   => ""
	        );
	    echo json_encode($message);
    }
    
    public function simpanlive(){
        /**tolong di isi validasi set rules
        rule nya :
            1. jika pilih_price = 'free' => priceshow = 0
            2. jika pilih_price = 'ticket'  => durasi harus diisi dan priceshow >= 0.5
            3. jika pilih_price = 'minutes' => durasi boleh kosong dan priceshow >=0.5
        **/
        
        $schedule   = $this->security->xss_clean($this->input->post("schedule"));
        $selection  = $this->security->xss_clean($this->input->post("selection"));
        $pilih_price= $this->security->xss_clean($this->input->post("pilih_price"));
        $priceshow  = $this->security->xss_clean($this->input->post("priceshow"));
        $durasi     = $this->security->xss_clean($this->input->post("durasi"));
        $deskripsi  = $this->security->xss_clean($this->input->post("deskripsi"));

        if (empty($schedule)){
            $post_time=date("Y-m-d H:i");
        }else{
            $datetime = new DateTime($schedule);
            $la_time = new DateTimeZone('Asia/Singapore');
            $datetime->setTimezone($la_time);
            $post_time=$datetime->format('Y-m-d H:i:s');
        }
        
        $lama=0;
        if ($pilih_price=="free"){
            $priceshow=0;
        }elseif ($pilih_price=="ticket"){
            $lama=$durasi;
        }
        
        $message="You Are Invited to join : 
                <br>At : ".$post_time." (performer time)";
        if ($pilih_price=="ticket" && $lama>0){
            $message.="<br>Duration : ".$durasi.$pilih_price;
        }
            $message.="<br>Description : ".$deskripsi;
        if ($pilih_price=="free"){
            $message.="<br>Cost : Free";
        }else{
            $message.="<br>Cost : ".$priceshow."/".$pilih_price;
        }
        
        $mdata=array(
                "start_time"    => $post_time,
                "selection"     => $selection,
                "meeting_type"  => $pilih_price,
                "price"         => $priceshow,
                "durasi"        => $durasi,
                "content_type"  => $_SESSION["content_type"],
                "article"       => $message,
            );

        $url = URLAPI . "/v1/member/post/liveperform";
        $result = apiciaklive($url,json_encode($mdata));

		if (@$result->code!=200){
            $this->session->set_flashdata('failed', $result->message);
	        return;
		}
		
		redirect("homepage");

    }
    
    public function simpancam(){
        /**tolong di isi validasi set rules**/
        
        $priceshow  = $this->security->xss_clean($this->input->post("priceshow"));
        $deskripsi  = $this->security->xss_clean($this->input->post("deskripsi"));
        $guestcam   = $this->security->xss_clean($this->input->post("guestcam"));
        $post_time=date("Y-m-d H:i");

        $message="You Are Invited to join ";
        $message.="<br>Description : ".$deskripsi;
        $message.="<br>Cost : ".$priceshow."/minutes";

        $mdata=array(
                "start_time"    => $post_time,
                "price"         => $priceshow,
                "content_type"  => $_SESSION["content_type"],
                "article"       => $message,
                "guestcam"      => $guestcam
            );

        $url = URLAPI . "/v1/member/post/performcam";
		$result = apiciaklive($url,json_encode($mdata));

		if (@$result->code!=200){
		    //set flash data error
	        return;
		}
		
		redirect("homepage");

    }
    
    public function simpanmeeting(){
        /**tolong di isi validasi set rules**/
        
        $deskripsi  = $this->security->xss_clean($this->input->post("deskripsi"));
        $guestcam       = $this->security->xss_clean($this->input->post("meetingcam"));
        $guestinvite    = $this->security->xss_clean($this->input->post("guestinvite"));
        $meetingtype    = $this->security->xss_clean($this->input->post("meetingtype"));


        $post_time=date("Y-m-d H:i");
        
        if ($guestinvite=='invite'){
            $message="You Are Invited to join meeting";
            $message.="<br>Description : ".$deskripsi;
        }
        
        if($guestinvite=='alone'){
            $message="You Are Invited to join meeting";
            $message.="<br>Description : ".$deskripsi;
        }


        $mdata=array(
                "start_time"    => $post_time,
                "content_type"  => $_SESSION["content_type"],
                "article"       => $message,
                "guestcam"      => @$guestcam,
                "meeting_type"  => $meetingtype
            );
        
            
       
        $url = URLAPI . "/v1/member/post/performmeeting";
		$result = apiciaklive($url,json_encode($mdata));
        // echo "<pre>".print_r($mdata,true)."</pre>";
        // die;
		if (@$result->code!=200){
		    //set flash data error
	        return;
		}
		
		redirect($result->message);

    }    

    public function invite_search(){
        $term=$this->security->xss_clean($_GET["term"]);
        $url = URLAPI . "/v1/member/follow/get_searchfollower?term=".$term;
        $result = @apiciaklive($url)->message;

        $data['search'] = $result;

        $this->load->view('apps/member/posting/app-result-invite-search', $data);
    }

    // public function vs($id)
    // {
    //     $post_id   = $this->security->xss_clean($id);

    //     if (!empty ($_SESSION["user_id"])){
    //         $url        = URLAPI . "/v1/member/post/get_singlepost?post_id=".$id;
    //     }else{
    //         $url        = URLAPI . "/auth/get_singlepost?post_id=".$id;
    //     }
	//     $result     = apiciaklive($url)->message;

    //     $mdata = array(
    //         'vspost'    => $result,
    //     );

    //     $this->session->set_flashdata('vs_data', $result);
    //     redirect('post');
    // }

}