<?php
/*----------------------------------------------------------
    Modul Name  : Modul Post
    Desc        : Modul ini di gunakan upload post dari user
                  

    Sub fungsi  : 
      - Index           : Tampilian Awal untuk semua jenis postingan
      - upload_image    : berfungsi untuk mengedit single image
      - upload_process  : berfungsi untuk memproses hasil image 
                          yang akan diupload
      - savepost        : Proses mengirimkan data Postingan ke API
      - simpanlive      : Proses mengirimkan data Liveshow ke API
      - simpancam       : Proses mengirimkan data Cam2Cam ke API
      - simpanmeeting   : Proses mengirimkan data Meeting Room ke API
      - invite_search   : Untuk mendapatkan searching data followers
      - payspecial      : Proses untuk membeli Postingan type special
      - paydownload     : Proses untuk membeli Postingan type download
      - givetips        : Proses untuk memberikan tip kepada member lain
      - savesubscription: Proses untuk mengatur subscription member



        
------------------------------------------------------------*/ 
defined('BASEPATH') or exit('No direct script access allowed');
use Maestroerror\HeicToJpg;

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


		$result     = apiciaklive(URLAPI . "/v1/member/profile/getProfile?userid=".$_SESSION["user_id"])->message;
        $following  = apiciaklive(URLAPI . "/v1/member/follow/getlist_following")->message;
        $follower   = apiciaklive(URLAPI . "/v1/member/follow/getlist_follower")->message;
        $get_price  = apiciaklive(URLAPI . "/v1/member/subscription/getPrice?userid=".$_SESSION["user_id"])->message;
        // echo "<pre>".print_r($get_price,true)."</pre>";
        // print_r(json_encode($get_price));
		// die;
        // $vsdata = $this->session->flashdata('vs_data');

        $data = array(
            'title'         => NAMETITLE . ' - Post',
            'profile'       => $result,
            'following'     => @$following,
            'follower'      => @$follower,
            'get_price'     => $get_price,
            // 'stitch'        => $vsdata,                 
            'content'       => 'apps/member/posting/app-posting',
            'cssextra'      => 'apps/member/posting/css/_css_index',
            'extra'         => 'apps/member/posting/js/_js_index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function convert_heic(){
        $image  = $_FILES["image"]["tmp_name"];
        $heictojpg = new Maestroerror\HeicToJpg(); 
        $jpg = $heictojpg->convert($image)->get();
        echo 'data:image/jpg;base64,' . base64_encode($jpg);
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

    public function savepost(){
        $input  = $this->input;
        $title   = $this->security->xss_clean($this->input->post("title_article"));
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
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => "No Post Content"
		        );
		    echo json_encode($message);
		    die;
        }

        
        //convert url to clickable       
        $pattern = '/((ftp|http|https):\/\/)?([a-z_-]+(?:(?:\.[\w_-]+)+))([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])/';
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
                "title_article" => empty($title) ? null : $title,
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
            
        // print_r(json_encode($result));
        // die;
		if (@$result->code!=200){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => $result
		        );
		    echo json_encode($message);
		    die;
		}
		 $message=array(
	            "success"   => true,
	            "message"   => ""
	        );
	    echo json_encode($message);
        die;
    }

    public function editpost($id)
    {
        $post_id        = $this->security->xss_clean($id);
        $result_post    = apiciaklive(URLAPI . "/v1/member/post/get_singlepost?post_id=".$id)->message;
        $get_price  = apiciaklive(URLAPI . "/v1/member/subscription/getPrice?userid=".$_SESSION["user_id"])->message;

        $new_media_image = array();
        $new_media_video = array();

        foreach($result_post->post_media as $dt){
            if($dt->media_extension == 'image'){
                $temp_media = 'data:image/jpg;base64,'.base64_encode(file_get_contents($dt->imgorg));;
                array_push($new_media_image, $temp_media);
            }else if($dt->media_extension == 'video'){
                $temp_media = $dt->imgorg;
                array_push($new_media_video, $temp_media);
            }
        }

        $new_media_image = json_encode($new_media_image);
        $new_media_video = json_encode($new_media_video);
        // echo $new_media_image;
        // die;

		// die;

        $data = array(
            'title'         => NAMETITLE . ' - Edit Post' ,
            'content'       => 'apps/member/posting/edit/index',
            // 'popup'         => 'apps/member/app-popup-single',
            'media_image'   => $new_media_image,
            'media_video'   => $new_media_video,
            'edit'          => $result_post,
            'get_price'     => $get_price,
            'post_id'       => $post_id,
            'cssextra'      => 'apps/member/posting/css/_css_index',
            'extra'         => 'apps/member/posting/edit/js/_js_index',
        );
        

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function saveEdit()
    {
        $input      = $this->input;
        $post_id    = $this->security->xss_clean($this->input->post("post_id"));
        $title      = $this->security->xss_clean($this->input->post("title_article"));
        $post       = $this->security->xss_clean($this->input->post("post"));
        $type       = $this->security->xss_clean($this->input->post("tipe"));
        $price      = $this->security->xss_clean($this->input->post("price"));
        $content_type      = $this->security->xss_clean($this->input->post("content_type"));

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
        $pattern = '/((ftp|http|https):\/\/)?([a-z_-]+(?:(?:\.[\w_-]+)+))([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])/';
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
            "post_id"       => $post_id,
            "title_article" => empty($title) ? null : $title,
            "article"       => $post,
            "type"          => $type,
            "price"         => $price,
            "attach_type"   => @$attach_type,
            // "id_stitch"     => (!empty($id_stitch)) ? $id_stitch : null,
            "content"       => @$blob,
            "content_type"  => $content_type
        );

        $url = URLAPI . "/v1/member/post/update";
        $result = apiciaklive($url,json_encode($mdata));
        
        print_r(json_encode($result));
		die;
    }
    
    public function simpanlive(){
        $input          = $this->input;
        $content_type   = $this->security->xss_clean($this->input->post("content_type"));

        $this->form_validation->set_rules('time', 'Time', 'trim|required');
        $this->form_validation->set_rules('selection', 'Post Type', 'trim|required');
        $this->form_validation->set_rules('pilih_price', 'Price Type', 'trim|required');
        $this->form_validation->set_rules('durasi', 'Duration', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Description', 'trim|required');
        
        if($this->security->xss_clean($this->input->post("time")) == 'schedule'){
            $this->form_validation->set_rules('schedule', 'Schedule Live Show', 'trim|required');
        }

        if($this->security->xss_clean($this->input->post("pilih_price")) == 'ticket' || $this->security->xss_clean($this->input->post("pilih_price")) == 'minutes'){  
            $this->form_validation->set_rules('priceshow', 'Price', 'trim|required');
        }

        if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', $this->response->error_msg(validation_errors()));
            redirect("post?type=".$content_type);
			return;
		}

        $time       = $this->security->xss_clean($this->input->post("time"));
        $schedule   = $this->security->xss_clean($this->input->post("schedule"));
        $selection  = $this->security->xss_clean($this->input->post("selection"));
        $pilih_price= $this->security->xss_clean($this->input->post("pilih_price"));
        $priceshow  = $this->security->xss_clean($this->input->post("priceshow"));
        $durasi     = $this->security->xss_clean($this->input->post("durasi"));
        $deskripsi  = $this->security->xss_clean($this->input->post("deskripsi"));

        // echo "<pre>".print_r($debdata,true)."</pre>";
		// die;
        

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

        if($time == 'now'){
            redirect("meeting/showlive?room_id=".$result->message->roomid);
        }

        redirect("homepage");


		

    }
    
    public function simpancam(){
        /**tolong di isi validasi set rules**/

        $input      = $this->input;
        $content_type   = $this->security->xss_clean($this->input->post("content_type"));

        $this->form_validation->set_rules('guestcam', 'Guest Cam2Cam', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', $this->response->error_msg(validation_errors()));
            redirect("post?type=".$content_type);
			return;
		}

        $input      = $this->input;
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

        // echo "<pre>".print_r($mdata,true)."</pre>";
		// die;

        $url = URLAPI . "/v1/member/post/performcam";
		$result = apiciaklive($url,json_encode($mdata));

		if (@$result->code!=200){
		    $this->session->set_flashdata('failed', $result->message);
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
        $content_type    = $this->security->xss_clean($this->input->post("content_type"));

        // echo "<pre>".print_r($guestcam,true)."</pre>";
		// die;
            


        $post_time=date("Y-m-d H:i");
        
        if ($guestinvite=='invite'){
            $message="You Are Invited to join meeting";
            $message.="<br>Description : ".$deskripsi;
        }

        if ($guestinvite=='alone'){
            $message="You Are Invited to join meeting";
            $message.="<br>Description : ".$deskripsi;
        }

        $mdata=array(
            "start_time"    => $post_time,
            "content_type"  => $_SESSION["content_type"],
            "article"       => $message,
            "guestcam"      => $guestcam,
            "meeting_type"  => $meetingtype
        );

        
        $url = URLAPI . "/v1/member/post/performmeeting";
        $result = apiciaklive($url,json_encode($mdata));
        // echo "<pre>".print_r($result,true)."</pre>";
        // die;
        
		if (@$result->code!=200){
		    $this->session->set_flashdata('error', $result->message);
            redirect("post?type=".$content_type);
	        return;
		}
		
		redirect('homepage');

    }    

    public function invite_search(){
        $term=$this->security->xss_clean($_GET["term"]);
        $url = URLAPI . "/v1/member/follow/get_searchfollower?term=".$term;
        $result = @apiciaklive($url)->message;

        $data['search'] = $result;

        $this->load->view('apps/member/posting/app-result-invite-search', $data);
    }
    
    public function payspecial(){
        $post_id  = $this->security->xss_clean($this->input->post("post_id"));
        @$homepage  = $this->security->xss_clean($this->input->post("homepage"));
        @$guest  = $this->security->xss_clean($this->input->post("guest"));
        @$ucodeguest  = $this->security->xss_clean($this->input->post("ucodeguest"));
        @$single  = $this->security->xss_clean($this->input->post("single"));

        $mdata=array(
            "homepage"      => @$homepage,
            "guest"         => @$guest,
            "ucodeguest"    => @$ucodeguest,
            "single"        => @$single,
        );


        $url = URLAPI . "/v1/member/post/paypost?post_id=".$post_id;
        $result = @apiciaklive($url);

        // print_r($result);
        // die;

        if ($result->code==200){
            redirect('profile/post/'.$post_id);
        }else{
            $this->session->set_flashdata("error",$result->message);
            if(!empty($mdata['homepage'])){
                    redirect("homepage");
                }else if(!empty($mdata['guest'])){
                        redirect("profile/guest_profile/".$mdata['ucodeguest']);
            }else if(!empty($mdata['single'])){
                    redirect("profile/post/".$post_id);
            }else{
                    redirect("searching");
            }
        }
    }

    public function paydownload(){
        $post_id  = $this->security->xss_clean($this->input->post("post_id"));
        @$homepage  = $this->security->xss_clean($this->input->post("homepage"));
        @$guest  = $this->security->xss_clean($this->input->post("guest"));
        @$ucodeguest  = $this->security->xss_clean($this->input->post("ucodeguest"));
        @$single  = $this->security->xss_clean($this->input->post("single"));

        $mdata=array(
            "homepage"      => @$homepage,
            "guest"         => @$guest,
            "ucodeguest"    => @$ucodeguest,
            "single"        => @$single,
        );

        $url = URLAPI . "/v1/member/post/pay_download?post_id=".$post_id;
        $result = @apiciaklive($url);

        if ($result->code==200){
            redirect('profile/post/'.$post_id);
        }else{
            $this->session->set_flashdata("error",$result->message);
            if(!empty($mdata['homepage'])){
                    redirect("homepage");
                }else if(!empty($mdata['guest'])){
                        redirect("profile/guest_profile/".$mdata['ucodeguest']);
            }else if(!empty($mdata['single'])){
                    redirect("profile/post/".$post_id);
            }else{
                    redirect("searching");
            }
        }
    }

    public function givetips(){
        $amount     = $this->security->xss_clean($this->input->post("amount"));
        $owner_post = $this->security->xss_clean($this->input->post("owner_post"));
        
        $balance    = apiciaklive(URLAPI . "/v1/member/wallet/getBalance?currency=USDX&userid=" . $_SESSION["user_id"])->message->balance;
        if ($amount<0.5){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => "Minimum tips is 0.5 USDX"
		        );
		    echo json_encode($message);
        }

        if ($balance<$amount){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => "Insufficient USDX funds"
		        );
		    echo json_encode($message);
        }

        $mdata = array(
                "receiver"  => $owner_post,
                "amount"    => $amount
            );
            
        // echo "<pre>".print_r($mdata,true)."</pre>";
        // die;

        $url = URLAPI . "/v1/member/post/post_tips";
        $result = @apiciaklive($url,json_encode($mdata));
        // echo "<pre>".print_r($result,true)."</pre>";
        // print_r(json_encode($result));
        // die;

        if (@$result->code!=200||@$result->status==400){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => (empty($result->message))?$result->messages:$result->message
		        );
		    echo json_encode($message);
        }

        if(@$result->code==200){
            $message=array(
                    "success"   => true,
                    "message"   => "Success Give Tip"
            );
            echo json_encode($message);
        }
    }

    public function savesubscription()
    {

        $this->form_validation->set_rules('weekly', 'Weekly', 'trim');
        $this->form_validation->set_rules('monthly', 'Monthly', 'trim');
        $this->form_validation->set_rules('yearly', 'Yearly', 'trim');
        $this->form_validation->set_rules('is_trial', 'Is Trial', 'trim');
        $this->form_validation->set_rules('triallong', 'Trial long', 'trim');
        $this->form_validation->set_rules('trialamount', 'Trial Amount', 'trim');


        $weekly     = $this->security->xss_clean($this->input->post("weekly"));
        $monthly    = $this->security->xss_clean($this->input->post("monthly"));
        $yearly     = $this->security->xss_clean($this->input->post("yearly"));
        $triallong  = $this->security->xss_clean($this->input->post("triallong"));
        $trialamount= $this->security->xss_clean($this->input->post("trialamount"));

        $mdata=array(
            "userid"    => $_SESSION["user_id"],
            "sub7"      => $weekly,
            "sub30"     => $monthly,
            "sub365"    => $yearly,
            "trial"     => $trialamount,
            "trial_long"=> $triallong,
        );
        $result =  apiciaklive(URLAPI . "/v1/member/subscription/setSubscription", json_encode($mdata));
        echo json_encode($result);
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
    
    public function comment(){
        $post_id   = $this->security->xss_clean($_GET["post_id"]);
        $comment   = $this->security->xss_clean($this->input->post("comment"));
        
        //validasi dibuat
        
        $mdata=array(
                "post_id"   => $post_id,
                "comment"   => $comment
            );
        
        $url=URLAPI . "/v1/member/post/comment";
        $result=apiciaklive($url,json_encode($mdata));

        if (@$result->code!=200){
            header("HTTP/1.0 406 Not Acceptable");
		    echo json_encode($result->message);
		    die;
        }
        
        echo json_encode($result->message);
    }
    
    public function readcomment(){
        $post_id   = $this->security->xss_clean($_GET["post_id"]);
        $url=URLAPI . "/v1/member/post/readcomment?post_id=".$post_id;
        $result=apiciaklive($url);
        


        if (@$result->code!=200){
            header("HTTP/1.0 406 Not Acceptable");
		    echo json_encode($result->message);
		    die;
        }
        
        echo json_encode($result->message);
    }

}