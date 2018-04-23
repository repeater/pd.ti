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

        // retrieves customer info from contact form
        $samples = (!empty($_POST['samples']) ? $_POST['samples'] : '');
        $email = (!empty($_POST['email']) ? $_POST['email'] : '');
        $firstname = (!empty($_POST['firstname']) ? $_POST['firstname'] : '');
        $lastname = (!empty($_POST['lastname']) ? $_POST['lastname'] : '');
        $phone = (!empty($_POST['phone']) ? $_POST['phone'] : '');
        $street = (!empty($_POST['street']) ? $_POST['street'] : '');
        $city = (!empty($_POST['city']) ? $_POST['city'] : '');
        $state = (!empty($_POST['state']) ? $_POST['state'] : '');
        $zip = (!empty($_POST['zip']) ? $_POST['zip'] : '');
//        $address_type = (!empty($_POST['address-type']) ? $_POST['address-type'] : '');
        if (!empty($_POST['address-type'])) {
            $address_type = 'Commercial';
        } else {
            $address_type = 'Residential';
        }
        $company = (!empty($_POST['company']) ? $_POST['company'] : '');
        $timeline = (!empty($_POST['timeline']) ? $_POST['timeline'] : '');
        $projectname = (!empty($_POST['projectname']) ? $_POST['projectname'] : '');
        $projectcomments = (!empty($_POST['projectcomments']) ? $_POST['projectcomments'] : '');
        
        
        $contact = array(
            'Email' => $email,
            'FirstName' => $firstname,
            'LastName' => $lastname,
            'Phone1' => $phone,
            'StreetAddress1' => $street,
            'City' => $city,
            'State' => $state,
            'PostalCode' => $zip,
            '_SRAddressType' => $address_type,
            'Company' => $company,
            '_FreeSampleProjectTimeline' => $timeline,
            '_NydreeParentSampleRequests' => $samples,
            '_ProjectName' => $projectname,
            '_ProjectComments' => $projectcomments
        );

        $contactId = $app->addWithDupCheck($contact, 'EmailAndName');

        $tagId = 267;
        $app->grpAssign($contactId, $tagId);

        $app->optIn($email,'Contact was added through the API using the contact form on our website.');

        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = 'Success!';
    }

    // return all our data to an AJAX call
    echo json_encode($data);

