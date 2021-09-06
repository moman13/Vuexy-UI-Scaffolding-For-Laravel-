<?php
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSendStaticMail;
function getPublicPathOnServer(){
    // just for check if this on local server or production server
    if($_SERVER['SERVER_NAME']=='baladi-atyaab.test'){
        return public_path();
    }

    return '/home/trssr/public_html/dev';
}
function resizeImagePost($image,$file_name,$width=null,$height=null)
{
    $image =getPublicPathOnServer().'/'.$image;

    $destinationPath = getPublicPathOnServer().'/momannew';

    $img = \Image::make($image);
    $img->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    })->save($destinationPath.'/'.'23_'.$file_name);

    return $destinationPath.'/'.'23_'.$file_name;
}
function save_image64($image){
    $name = time().'.'.explode('/',explode(':',substr($image,0,strpos($image,';')))[1])[1];

    \Image::make($image)->save(getPublicPathOnServer().'/setting_image/'.$name);
    // dashbord/userImage/user.png
    //  $data=['success','name'=>$name,'path'=>asset('/setting_image/'.$name)];
    return $name;
}
function saveBase64Image($image, $direction,$width=null,$hight=null,$image_type=null,$water_mark=false)
{
    //dd(getimagesize($image));
    $image_data = getimagesize($image);
    $image_width = $image_data[0];
    $image_height = $image_data[1];

    $img = Image::make($image);

    $mime = explode('/', $img->mime)[1];

    // check direction
    $dir = 'uploads/'. $direction;
    //mkdir(my_public(). $dir);

    if(!File::exists(getPublicPathOnServer().'/uploads/'. $direction .'/')){
        File::makeDirectory(getPublicPathOnServer().'/uploads/'.$direction, 0755, true);
    }
    if(!File::exists(getPublicPathOnServer() .'/'. $dir)){
        File::makeDirectory(getPublicPathOnServer().'/'. $dir, 0755, true);
    }


    // check thump direction
    if(!File::exists(getPublicPathOnServer().'/uploads/'. $direction .'/')){
        File::makeDirectory(getPublicPathOnServer().'/uploads/'.$direction.'/thump', 0755, true);
    }

    if(!File::exists(getPublicPathOnServer() .'/'. $dir .'/thump/')){
        File::makeDirectory(getPublicPathOnServer(). '/'.$dir .'/thump/', 0755, true);
    }

    if(!File::exists(getPublicPathOnServer() .'/'. $dir .'/thump_770/')){
        File::makeDirectory(getPublicPathOnServer().'/'.  $dir .'/thump_770/', 0755, true);
    }

    if(!File::exists(getPublicPathOnServer() .'/'. $dir .'/thump_370/')) File::makeDirectory(getPublicPathOnServer().'/'.  $dir .'/thump_370/', 0755, true);
    if(!File::exists(getPublicPathOnServer() .'/'. $dir .'/thump_120/'))  File::makeDirectory(getPublicPathOnServer().'/'.  $dir .'/thump_120/', 0755, true);


    // save Image
    $file_name = rand(10000, 99999) . '.' . $mime;
    $img->save(getPublicPathOnServer() .'/'. $dir . '/' .$file_name);

    $image_big=getPublicPathOnServer() .'/'. $dir . '/' .$file_name;
    if($image_type=='small'){
        compress_image($image_big,$image_big, 100);
    }
    // save_thump
    if($width){

        $thump_image = $img->resize($width, $hight);
        $img->save(getPublicPathOnServer() .'/'. $dir . '/' .$file_name);
        $thump_image = $img->resize(370, 230);
        $img->save(getPublicPathOnServer() .'/'. $dir . '/thump_370/' .$file_name);
        $image_big=getPublicPathOnServer() .'/'. $dir . '/' .$file_name;
        $image_thumb=getPublicPathOnServer() .'/'. $dir . '/thump_370/' .$file_name;
        compress_image($image_big,$image_big, 100);
        compress_image($image_thumb,$image_thumb, 100);

    }
    else{
        if($image_width < 770 ||$image_height<480){
            //$watermark = Image::make(my_public().'/img/31993.png');
            //$watermark->insert($img, 'center');
            $img->save(getPublicPathOnServer() .'/'. $dir . '/thump_770/' .$file_name);

        }else{
            $img->resize(770, 480);
            $img->save(getPublicPathOnServer() .'/'. $dir . '/thump_770/' .$file_name);

        }

        $thump_image2 = $img->resize(370, 230);
        $img->save(getPublicPathOnServer() .'/'. $dir . '/thump_370/' .$file_name);
        $thump_image3 = $img->resize(170, 155);
        $img->save(getPublicPathOnServer() .'/'. $dir . '/thump_120/' .$file_name);

        $image_image1=getPublicPathOnServer() .'/'. $dir . '/thump_770/' .$file_name;
        $image_image2=getPublicPathOnServer() .'/'. $dir . '/thump_370/' .$file_name;
        $image_image3=getPublicPathOnServer() .'/'. $dir . '/thump_120/' .$file_name;
        $image_width = $image_data[0];
        compress_image($image,$image_image1, 100,770,480,$image_width,$image_height);
        compress_image($image,$image_image2, 100,370,230,$image_width,$image_height);
        compress_image($image,$image_image3, 100,170,155,$image_width,$image_height);
    }
    $data = ['name'=>$file_name,'path'=>$dir.'/'.$file_name];
    return $data;
}
function compress_image($source_url, $destination_url, $quality,$after_width,$after_height,$width,$height) {
    $info = getimagesize($source_url);
    if ($width > $after_width) {

        //get the reduced width
        $reduced_width = ($width - $after_width);
        //now convert the reduced width to a percentage and round it to 2 decimal places
        $reduced_radio = round(($reduced_width / $width) * 100, 2);

        //ALL GOOD! let's reduce the same percentage from the height and round it to 2 decimal places
        $reduced_height = round(($height / 100) * $reduced_radio, 2);
        //reduce the calculated height from the original height
        $after_height = $height - $reduced_height;
    }

    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source_url);
        imagejpeg($image, $destination_url, $quality);
    }
    elseif ($info['mime'] == 'image/gif'){
        $image = imagecreatefromgif($source_url);
        imagejpeg($image, $destination_url, $quality);
    }
    elseif ($info['mime'] == 'image/png'){
        $img = imagecreatefrompng($source_url);
        $targetLayer=imagecreatetruecolor($after_width,$after_height);
        imagealphablending($targetLayer, false);
        imagesavealpha($targetLayer,true);
        $transparency = imagecolorallocatealpha($targetLayer, 255, 255, 255, 127);
        imagefilledrectangle($targetLayer, 0, 0, $after_width, $after_height, $transparency);
        imagecopyresampled($targetLayer,$img,0,0,0,0,$after_width,$after_height, $width,$height);

        imagepng($targetLayer,$destination_url,9);
    }



    //save file


    //return destination file
    return $destination_url;
}
function saveFile($file, $direction)
{
    // dd($file,$direction);
    $mime = $file->getClientOriginalExtension();
    $allowed_extensions = ['jpeg',"JPEG", 'png','PNG','jpg',"JPG","gif","GIF",'jfif','webp']; // must be an array. Extensions disallowed to be uploaded
    $dir = '/uploads/'. $direction ;
    // dd($mime);
    if(in_array($mime,$allowed_extensions)){
        $file_name = rand(10000, 99999) . '.' . $mime;

        $data = ['name'=>$file_name,'path'=>$dir.'/'.$file_name];
    }
    else{
        $data = ['name'=>'','path'=>''];
    }


    return $data ;
}
function is_base64($s)
{
    return (bool) preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s);
}
function IsBase64($s)
{
    // Check if there are valid base64 characters
    if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $s)) return false;
    // Decode the string in strict mode and check the results
    $decoded = base64_decode($s, true);
    if(false === $decoded) return false;
    // if string returned contains not printable chars
    if (0 < preg_match('/((?![[:graph:]])(?!\s)(?!\p{L}))./', $decoded, $matched)) return false;
    // Encode the string again
    if(base64_encode($decoded) != $s) return false;
    return true;
}

function send_smsMobile($admin_numbers,$admin_msg){
    $messgmobile = urlencode($admin_msg);
    //$admin_numbers ="0595611823";
    $url = "http://tweetsms.ps/api.php?comm=sendsms&user=Zara.com.ps&pass=951741&to=" . $admin_numbers . "&message=" . $messgmobile . "&sender=Zara.com.ps";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $content = curl_exec($ch);
}


function priceWithAndWithoutTax($price,$qty,$tax){

    $percNumber = $tax / 100.00;
    $total = $qty *$price;
    $tax_amount = $total -($total/($percNumber+1));
    $tax_amount = ($tax_amount);
//    dd($tax_amount,$total,$percNumber,$total-$tax_amount);
    return ['tax_amount'=>myRound($tax_amount),'price_without_tax'=>myRound($total-$tax_amount) ,'price_with_tax'=>myRound($total), 'tax'=>$tax , 'product_qty'=>$qty ];

}

function myRound($price , $precision = 2){
    return round($price,$precision);
}

function getValueForAttributeOnAtrributeTemplateBladePage($attribute_id,$array){
    foreach ($array as $item){
        if($item['key']==$attribute_id){
            return $item['value'];
        }
    }
    return false;
}

function PriceReturn($price,$currency){
    $res = false;
    if ($price == (int)$price){//int
        return $currency.$price.',-';
    }else{//float
        return $currency.round($price,2);
    }

}
function ArabicDate($date) {
    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = $date; // The Current Date
    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date("D", strtotime($your_date)); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("0","1","2","3","4","5","6","7","8","9");
    $current_date = ' '.date("d", strtotime($your_date)).' , '.$ar_month.'  '.date("Y", strtotime($your_date));
    $arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $arabic_date;
}

function getTimeFormate($date,$type){
    $dtFormat = "Y-m-d H:i:s"; //MySQL Datetime format
    $curDT = $date;
    $curTime = strtotime($curDT);
    if($type == 'time'){
        $nowFormat = "h:i ";
        $arrEn = array('am', 'pm');
        $arrAr = array('ص', 'م');
        return  date($nowFormat).str_replace($arrEn, $arrAr,date("a", $curTime));
    }else{
        $nowFormat = "Y-m-d";
        return  $date;
    }



}

function generateNDigitRandomNumber($length){
    return mt_rand(pow(10,($length-1)),pow(10,$length)-1);
}

function checkStoreProductCount($get_product_number=false){
    $store = auth('store')->user();
    $subscription =$store->subscription->last();
    $plan = $subscription->plan;

    $plan_product_count = $plan->product;
    $store_product_count =$store->product_count;
    if($get_product_number){
        return $plan_product_count-$store_product_count;
    }
    $expired_date =$subscription->expired_date;
    $current_date = \Carbon\Carbon::now();
    if($store_product_count < $plan_product_count  || $current_date < $expired_date ){
        return true;
    }else{
        return false;
    }

}

function checkStoreAuthorized($product_store_id){
    if($product_store_id != auth('store')->id()){
        abort(404);
        exit();
    }
}
function priceWithTax($price,$tax){

    $percNumber = $tax / 100.00;
    $total = $price;
    $tax_amount = $total -($total/($percNumber+1));
    $tax_amount = ($tax_amount);

    return myRound($total+$tax_amount);

}


function search_by_value($array, $key, $value,$key2,$value2)
{
    $results = array();

    if (is_array($array)) {
        if ((isset($array[$key]) && $array[$key] == $value)&&(isset($array[$key2]) && $array[$key2] == $value2)) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, search_by_value($subarray, $key, $value,$key2,$value2));
        }
    }

    return $results;
}

function searchAndReturnIndex($array, $key, $value)
{
    $results = array();

    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }

    return $results;
}

function fcmNotification($user, $sendData){


    //get function from other controller

    $fcm_key='AAAAalJYhr0:APA91bF0uq0c4Qteoo89MO1hTbSyqDFYXZi7_RV8fQZWykHF4HSB6aioKs2uI-tjVoDqx_wraRA5pEVxVXDGFfpdorf4o6NiIGD2fJTWzA0ahu2M-wGVSs_RwK6AmO-I9wd2B6_I76-F';

    if($user->device_type =="Android"){
        $fields = array
        (
            'to'    => $user->fcm_token,
            'data'  => $sendData,

        );
    }else{

        $fields = array
        (
            'to'    => $user->fcm_token,
            'data'  => $sendData,
            'notification'  => $sendData,

        );
    }


    $headers = array
    (
        'Authorization: key=' . $fcm_key,
        'Content-Type: application/json'
    );
    #Send Reponse To FireBase Server
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, true );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch);
    $data = json_decode($result);
    if($result === false)
        die('Curl failed ' . curl_error());

    curl_close($ch);

    if(!empty($data->success) and $data->success >= 1){
        $response = '1';
    }else{
        $response = '0';
    }

    return $data;

}
function numberFormat($number, $decimals = 0, $decPoint = '.' , $thousandsSep = ',')
{
    $negation = ($number < 0) ? (-1) : 1;
    $coefficient = pow(10, $decimals);
    $number = $negation * floor((string)(abs($number) * $coefficient)) / $coefficient;
    $number=number_format($number, $decimals, $decPoint, $thousandsSep);
    $final = (double)$number;
    return round($final,2);
}
function cutNum($num, $precision = 2) {
    $integerPart = floor($num);
    $decimalPart = str_replace($integerPart, '', $num);
    $trimmedDecimal = substr($decimalPart, 0, $precision + 1);
    return $integerPart . $trimmedDecimal;
}

