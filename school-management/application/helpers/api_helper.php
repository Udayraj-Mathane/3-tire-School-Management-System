<!-- <?php
// function call_api($method, $url, $data = false, $is_delete = false) {
//     $curl = curl_init();
    
//     $username = 'admin';
//     $password = '1234';
//     $api_key = 'funda123';
    
//     switch($method) {
//         case 'GET':
//             curl_setopt($curl, CURLOPT_HTTPGET, true);
//             break;
//         case 'POST':
//             curl_setopt($curl, CURLOPT_POST, true);
//             if($data)
//                 curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
//             break;
//         case 'PUT':
//             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
//             if($data)
//                 curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
//             break;
//         case 'DELETE':
//             curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
//             break;
//     }
    
//     curl_setopt($curl, CURLOPT_URL, $url);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//     curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
    
//     $headers = [
//         'X-API_KEY: ' . $api_key,
//         'Content-Type: application/x-www-form-urlencoded'
//     ];
//     curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
//     $result = curl_exec($curl);
//     curl_close($curl);
    
//     return json_decode($result, true);
// }
?> -->