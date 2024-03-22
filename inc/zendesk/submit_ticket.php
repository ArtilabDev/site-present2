<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


add_action( 'wpcf7_before_send_mail', 'send_to_zendesk', 10, 1 );
function send_to_zendesk( $wpcf7 ) {
    $form_title = $wpcf7->title;
    $form_id = $wpcf7->id();
    $request_form_id = get_field('request_form_zendesk', 'option');
    $bug_form_id = get_field('bug_form_zendesk', 'option');
    // ticket_form_id
    // BUG - 17417692712082
    // Request - 17417515740562

    $submission = WPCF7_Submission::get_instance();
    if ( $submission ) {
        $posted_data = $submission->get_posted_data();

        // Date form
        $subject = $posted_data['your-subject'];
        $name = $posted_data['your-name'];
        
        $email = $posted_data['your-email'];
        $telegram = $posted_data['text-telegram'];
      
        $message = $posted_data['textarea-comment'];
        $wallet_adress = $posted_data['text-wallet-adress'];
        $text_model = $posted_data['text-model'];
        $files = $submission->uploaded_files();
        // $files = $posted_data['upload-file-56'];
        $network = $posted_data['select_and_icon-strategy'];
        $countries = $posted_data['select_countries'];
        $select_area = $posted_data['select-area'];
        $operation_system = $posted_data['select-operation-system'];
        $device_brand = $posted_data['select-device-brand'];
        $ticket_form_id = 0;
        $ticket_data = array();

        $ticket_data = array(
          'subject' => $subject,
          'name' => $name,
          'email' => $email,
          'telegram' => $telegram,
          'message' => $message,
          'ticket_form_id' => ($form_id == $bug_form_id) ? '17417692712082' : '17417515740562',
        );
      
        if ($form_id == $bug_form_id) { //BUG
            $ticket_data['wallet_adress'] = $wallet_adress;
            $ticket_data['text_model'] = $text_model;
            $ticket_data['network'] = $network;
            $ticket_data['countries'] = $countries;
            $ticket_data['area'] = $select_area;
            $ticket_data['os'] = $operation_system;
            $ticket_data['brand'] = $device_brand;
        }
      
      
        send_ticket_to_zendesk($ticket_data, $files );
    }
    return;
    die();
}

function send_ticket_to_zendesk($ticket_data, $files) {

    $subdomain = 'dollet'; // Subdomen Zendesk
    $username = '******'; // Write Login
    $token = '******'; //  Write API token
    $ticket_form_id = $ticket_data['ticket_form_id'];
    $url = "https://$subdomain.zendesk.com/api/v2/tickets.json";


    // files 
    $files_data = array();
    if (!empty($files)) {
      foreach ($files as $file) {
        $token_img = upload_file_to_zendesk($subdomain, $username, $token, $file[0]);
        if ($token_img !== null) {
                $files_data[] = $token_img;
            }
        }
    }

    if($ticket_form_id === '17417692712082'){
      $custom_fields = array(
        array('id' => 17417740871826, 'value' => $ticket_data['telegram']),
        array('id' => 17417760297490, 'value' => $ticket_data['countries']),
        array('id' => 17417767289746, 'value' => $ticket_data['brand']),
        array('id' => 17417752214162, 'value' => $ticket_data['text_model']),
        array('id' => 17417750824594, 'value' => $ticket_data['area']),
        array('id' => 17417731043218, 'value' => $ticket_data['network']),
        array('id' => 17417772225810, 'value' => $ticket_data['os']),
        array('id' => 17417731777682, 'value' => $ticket_data['wallet_adress'])
      );
    } 
    
    if($ticket_form_id === '17417515740562'){
      $custom_fields = array(
        array('id' => 17417740871826, 'value' => $ticket_data['telegram']),
      );
    }


    // Date ticket
    $data = array(
        'ticket' => array(
            'subject' => $ticket_data['subject'],
            'comment' => array(
                'body' => $ticket_data['message']
            ),
            'requester' => array(
                'name' => $ticket_data['name'],
                'email' => $ticket_data['email']
            ),
            'custom_fields' => $custom_fields,
            // 'priority' => 'normal',
            "group_id" => "17417515796626",
            "ticket_form_id" => $ticket_form_id,
            "status" => "new"
        )
    );

    // add date for file
    if (!empty($files_data)) {
        $data['ticket']['comment']['uploads'] = $files_data;
    }

    // code JSON
    $post_data = json_encode($data);
    
    $ch = curl_init($url);

    // Parametrs cURL
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_USERPWD, "$username/token:$token");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if($response === false){
        echo 'Error cURL: ' . curl_error($ch);
    } 

    curl_close($ch);

}


function upload_file_to_zendesk($subdomain, $username, $token, $file) { //request files
  $filename = basename($file);
  $file_path = $file;
  $upload_url = "https://$subdomain.zendesk.com/api/v2/uploads.json?filename=$filename";
  $file_type = mime_content_type($file_path);

  $ch = curl_init($upload_url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:' . $file_type));
  curl_setopt($ch, CURLOPT_USERPWD, "$username/token:$token");
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents($file_path));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if ($http_status == 201) {
      $upload_response = json_decode($response, true);
      return $upload_response['upload']['token'];
  } 
}