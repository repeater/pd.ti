<?php
// process.php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array

    if (empty($_POST['email']))
        $errors['email'] = 'Email is required.';

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

        $appName = 'qi230';
        $apiKey = '191d401a8764143df9cf510b1a222b8c';

        // establishes infusionsoft app and connection to account
        $app = new iSDK();
        $app->cfgCon($appName, $apiKey);

        // retrieves customer name and email from contact form
        $email = $_POST['email'];

        $contact = array(
            'Email' => $email
        );

        $contactId = $app->addWithDupCheck($contact, 'Email');

        $tagId = 257;
        $app->grpAssign($contactId, $tagId);

        $app->optIn($email,'Contact was added through the API using the contact form on our website.');

        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = 'Success!';
    }

    // return all our data to an AJAX call
    echo json_encode($data);

