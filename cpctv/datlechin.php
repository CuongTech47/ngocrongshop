<?PHP
if(isset($_FILES['datlechin_1'])){
$image_name = $_FILES['datlechin_1']['name']; //file name
    $image_size = $_FILES['datlechin_1']['size']; //file size
    $image_temp = $_FILES['datlechin_1']['tmp_name']; //file temp
    $image_size_info = getimagesize($image_temp); //get image size
    if($image_size_info){
        $image_type = $image_size_info['mime']; //image type
    }
    $filename = $image_temp;
    $client_id = "efe8365a1a23765";
    $handle = fopen($filename, "r");
    $data = fread($handle, filesize($filename));
    $pvars = array('image' => base64_encode($data));
    $timeout = 30;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
    $out = curl_exec($curl);
    curl_close ($curl);
    $pms = json_decode($out,true);
    $url = $pms['data']['link'];
    $size = substr(($pms['data']['size']/1024),0,4);
    $time = time();
  //  $id = isset($id) ? $id:$user_id;
    @unlink($filename);
    if(!empty($url)){
   $anh1=''.$url.'';
    }
     }
	 
	 if(isset($_FILES['datlechin_2'])){
$image_name = $_FILES['datlechin_2']['name']; //file name
    $image_size = $_FILES['datlechin_2']['size']; //file size
    $image_temp = $_FILES['datlechin_2']['tmp_name']; //file temp
    $image_size_info = getimagesize($image_temp); //get image size
    if($image_size_info){
        $image_type = $image_size_info['mime']; //image type
    }
    $filename = $image_temp;
    $client_id = "efe8365a1a23765";
    $handle = fopen($filename, "r");
    $data = fread($handle, filesize($filename));
    $pvars = array('image' => base64_encode($data));
    $timeout = 30;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
    $out = curl_exec($curl);
    curl_close ($curl);
    $pms = json_decode($out,true);
    $url = $pms['data']['link'];
    $size = substr(($pms['data']['size']/1024),0,4);
    $time = time();
  //  $id = isset($id) ? $id:$user_id;
    @unlink($filename);
    if(!empty($url)){
   $anh2=''.$url.'';
    }
     }
	 
	 
	 if(isset($_FILES['datlechin_3'])){
$image_name = $_FILES['datlechin_3']['name']; //file name
    $image_size = $_FILES['datlechin_3']['size']; //file size
    $image_temp = $_FILES['datlechin_3']['tmp_name']; //file temp
    $image_size_info = getimagesize($image_temp); //get image size
    if($image_size_info){
        $image_type = $image_size_info['mime']; //image type
    }
    $filename = $image_temp;
    $client_id = "efe8365a1a23765";
    $handle = fopen($filename, "r");
    $data = fread($handle, filesize($filename));
    $pvars = array('image' => base64_encode($data));
    $timeout = 30;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
    $out = curl_exec($curl);
    curl_close ($curl);
    $pms = json_decode($out,true);
    $url = $pms['data']['link'];
    $size = substr(($pms['data']['size']/1024),0,4);
    $time = time();
  //  $id = isset($id) ? $id:$user_id;
    @unlink($filename);
    if(!empty($url)){
   $anh3=''.$url.'';
    }
     }
	 
	 
	 if(isset($_FILES['datlechin_4'])){
$image_name = $_FILES['datlechin_4']['name']; //file name
    $image_size = $_FILES['datlechin_4']['size']; //file size
    $image_temp = $_FILES['datlechin_4']['tmp_name']; //file temp
    $image_size_info = getimagesize($image_temp); //get image size
    if($image_size_info){
        $image_type = $image_size_info['mime']; //image type
    }
    $filename = $image_temp;
    $client_id = "efe8365a1a23765";
    $handle = fopen($filename, "r");
    $data = fread($handle, filesize($filename));
    $pvars = array('image' => base64_encode($data));
    $timeout = 30;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
    $out = curl_exec($curl);
    curl_close ($curl);
    $pms = json_decode($out,true);
    $url = $pms['data']['link'];
    $size = substr(($pms['data']['size']/1024),0,4);
    $time = time();
  //  $id = isset($id) ? $id:$user_id;
    @unlink($filename);
    if(!empty($url)){
   $anh4=''.$url.'';
    }
     }
	 
	 
	 
	 if(isset($_FILES['datlechin_5'])){
$image_name = $_FILES['datlechin_5']['name']; //file name
    $image_size = $_FILES['datlechin_5']['size']; //file size
    $image_temp = $_FILES['datlechin_5']['tmp_name']; //file temp
    $image_size_info = getimagesize($image_temp); //get image size
    if($image_size_info){
        $image_type = $image_size_info['mime']; //image type
    }
    $filename = $image_temp;
    $client_id = "efe8365a1a23765";
    $handle = fopen($filename, "r");
    $data = fread($handle, filesize($filename));
    $pvars = array('image' => base64_encode($data));
    $timeout = 30;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
    $out = curl_exec($curl);
    curl_close ($curl);
    $pms = json_decode($out,true);
    $url = $pms['data']['link'];
    $size = substr(($pms['data']['size']/1024),0,4);
    $time = time();
  //  $id = isset($id) ? $id:$user_id;
    @unlink($filename);
    if(!empty($url)){
   $anh5=''.$url.'';
    }
     }
	 
	 
	 if(isset($_FILES['datlechin_6'])){
$image_name = $_FILES['datlechin_6']['name']; //file name
    $image_size = $_FILES['datlechin_6']['size']; //file size
    $image_temp = $_FILES['datlechin_6']['tmp_name']; //file temp
    $image_size_info = getimagesize($image_temp); //get image size
    if($image_size_info){
        $image_type = $image_size_info['mime']; //image type
    }
    $filename = $image_temp;
    $client_id = "efe8365a1a23765";
    $handle = fopen($filename, "r");
    $data = fread($handle, filesize($filename));
    $pvars = array('image' => base64_encode($data));
    $timeout = 30;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
    $out = curl_exec($curl);
    curl_close ($curl);
    $pms = json_decode($out,true);
    $url = $pms['data']['link'];
    $size = substr(($pms['data']['size']/1024),0,4);
    $time = time();
  //  $id = isset($id) ? $id:$user_id;
    @unlink($filename);
    if(!empty($url)){
   $anh6=''.$url.'';
    }
     }
	 
	 
	 if(isset($_FILES['datlechin_7'])){
$image_name = $_FILES['datlechin_7']['name']; //file name
    $image_size = $_FILES['datlechin_7']['size']; //file size
    $image_temp = $_FILES['datlechin_7']['tmp_name']; //file temp
    $image_size_info = getimagesize($image_temp); //get image size
    if($image_size_info){
        $image_type = $image_size_info['mime']; //image type
    }
    $filename = $image_temp;
    $client_id = "efe8365a1a23765";
    $handle = fopen($filename, "r");
    $data = fread($handle, filesize($filename));
    $pvars = array('image' => base64_encode($data));
    $timeout = 30;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
    $out = curl_exec($curl);
    curl_close ($curl);
    $pms = json_decode($out,true);
    $url = $pms['data']['link'];
    $size = substr(($pms['data']['size']/1024),0,4);
    $time = time();
  //  $id = isset($id) ? $id:$user_id;
    @unlink($filename);
    if(!empty($url)){
   $anh7=''.$url.'';
    }
     }
	 
	 	 if(isset($_FILES['datlechin_8'])){
$image_name = $_FILES['datlechin_8']['name']; //file name
    $image_size = $_FILES['datlechin_8']['size']; //file size
    $image_temp = $_FILES['datlechin_8']['tmp_name']; //file temp
    $image_size_info = getimagesize($image_temp); //get image size
    if($image_size_info){
        $image_type = $image_size_info['mime']; //image type
    }
    $filename = $image_temp;
    $client_id = "efe8365a1a23765";
    $handle = fopen($filename, "r");
    $data = fread($handle, filesize($filename));
    $pvars = array('image' => base64_encode($data));
    $timeout = 30;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
    $out = curl_exec($curl);
    curl_close ($curl);
    $pms = json_decode($out,true);
    $url = $pms['data']['link'];
    $size = substr(($pms['data']['size']/1024),0,4);
    $time = time();
  //  $id = isset($id) ? $id:$user_id;
    @unlink($filename);
    if(!empty($url)){
   $anh8=''.$url.'';
    }
     }
	 
	 
	 
	 
	 
	 
	 