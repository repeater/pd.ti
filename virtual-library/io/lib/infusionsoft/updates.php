<?php
// process.php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array

//    if (empty($_POST['c-email']))
//        $errors['c-email'] = 'Email is required.';

// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors process our form, then return a message

        // DO ALL YOUR FORM PROCESSING HERE
        // set default timezone
        date_default_timezone_set('America/New_York');

        // include API files
        require_once('infusionsoft/isdk.php');

        $appName = 'bt298';
        $apiKey = '31d4aac56412c7ef65d01b7f8a32cdd0';

        // establishes infusionsoft app and connection to account
        $app = new iSDK();
        $app->cfgCon($appName, $apiKey);
                
                
        // retrieves customer info from contact form
        $email = (!empty($_POST['i-email']) ? $_POST['i-email'] : '');
        
        $contact = array(
            'Email' => $email
        );

        $contactId = $app->addWithDupCheck($contact, 'Email');

//        $tagId = 102;
//        $app->grpAssign($contactId, $tagId);

        $app->optIn($email,'Contact was added through the API using the contact form on our website.');

        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = 'Success!';
        $data['contact'] = $contact;
    }

    // return all our data to an AJAX call
    echo json_encode($data);

