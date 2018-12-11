<?php

/**
 * Helpful function that gets all the e-mail addresses of the
 * user who got registered to the webform
 *
 * @return array 
 *         An array of e-mail addresses
 */

function webform_mailing_get_recipients($nid) {
	
  $cid = '';
  $data = array();

  // Get the cid (the column that contains the email addresses)
  
  $query = db_select('webform_component', 'n');
  $query->addField('n', 'cid', 'cid');
  $query->condition('n.nid', $nid);
  $query->condition('n.type', 'email');
  $results = $query->execute();

  foreach ($results as $row) {
    $cid = $row->cid;
  }

  // Now we have the cid, get all the e-mail addresses

	$query = db_select('webform_submitted_data', 'n');
	$query->addField('n', 'data', 'email');
	$query->condition('n.cid', $cid);
	$query->condition('n.nid', $nid);
	$results = $query->execute();

	foreach ($results as $row) {
		$data[] = $row->email;
	}
	return $data;
}

/**
 * Implements hook_form
 */

function webform_mailing_form($form, &$form_state, $arguments) {

	// Build the the list of e-mails
  
  $nid = $arguments->nid;
  $form_state['storage']['nid'] = $nid;
  $data = webform_mailing_get_recipients($nid);

  $list  = '<p>' . t('This mailing will be sent to the following recipients:') . '</p>';
  $list .= '<ul>';
  foreach ($data as $item) {
    $list .= '<li>' . $item . '</li>';
  }
  $list .= '</ul>';

  // Header
  
  $header  = '<div class="header">';
  $header .= '<h1>' . t('Webform mailing') . '</h1>';
  $header .= '<p>' . t('This tool allows you to send e-mail notifications to all the registered users to this webform. ') . '<br>';
  $header .= '<b>' . t('IMPORTANT:') . '</b> ' . t('The webform must only contain one field of type "e-mail" in order to work properly.'). '</p>';
  $header .= '</div>';

  $form['header'] = array(
    '#type' => 'markup',
    '#markup' => $header,
  );

  if (isset($form_state['storage']['mode'])) {
    $mode_value = $form_state['storage']['mode'];
  }
  else {
    $mode_value = 'test';
  }

  $form['mode'] = array(
    '#type' => 'radios',
    '#title' => t('Select the mailing mode'),
    '#default_value' =>  $mode_value,
    '#options' => array('test' => t('Test mode'), 'real' => t('Send for real')),
  );

  $form['mode_submit'] = array(
    '#type' => 'submit',
    '#id' => 'mode-submit',
    '#value' => t('Set the mailing mode'),
  );

  if (isset($form_state['storage']['mode']) && $form_state['storage']['mode'] == 'test') {
    
    if (isset($form_state['storage']['test_mail'])) {
      $test_mail_value = $form_state['storage']['test_mail'];
    }
    else {
      $test_mail_value = '';
    }

    $form['test_mail'] = array(
      '#title' => t('Test recipient'),
      '#description' => t('Set an e-mail address to test this mailing.'),
      '#type' => 'textfield',
      '#maxlength' => 120,
      '#required' => FALSE,
      '#size' => 60,
      '#default_value' => $test_mail_value,
    );
  }

  if (isset($form_state['storage']['mode']) && $form_state['storage']['mode'] == 'real') {
  
    $form['fieldset'] = array(
      '#tree' => TRUE,
      '#type' => 'fieldset', 
      '#title' => t('Recipients'), 
      '#collapsible' => TRUE, 
      '#collapsed' => FALSE,
    );

  	$form['fieldset']['recipients'] = array(
  		'#type' => 'markup',
  		'#markup' => $list,
  	);
  }

  if (isset($form_state['storage']['mode'])) {

    if (isset($form_state['storage']['subject'])) {
      $subject_value = $form_state['storage']['subject'];
    }
    else {
      $subject_value = '';
    }

  	$form['subject'] = array(
      '#title' => t('E-mail subject'),
      '#description' => t('Only plain text is allowed for this field.'),
      '#type' => 'textfield',
      '#maxlength' => 60,
      '#required' => FALSE,
      '#size' => 60,
      '#default_value' => $subject_value,
    );

    if (isset($form_state['storage']['message'])) {
      $message_value = $form_state['storage']['message'];
    }
    else {
      $message_value = '';
    }

    $form['message'] = array(
      '#title' => t('E-mail body'),
      '#description' => t('Only plain text is allowed for this field.'),
      '#type' => 'textarea',
      '#required' => FALSE,
      '#default_value' => $message_value,
    );

    $form['form_submit'] = array(
      '#type' => 'submit',
      '#id' => 'form-submit',
      '#attributes' => array('class' => array('action-item-primary')),
      '#value' => t('Send mailing'),
    );

    $form['form_clear'] = array(
      '#type' => 'submit',
      '#id' => 'form-clear',
      '#attributes' => array('class' => array('action-item-secondary')),
      '#value' => t('Reset form'),
    );
  }

  return $form;
}

/**
 * Implements hook_form_validate
 */

function webform_mailing_form_validate($form, &$form_state) {

  // Validation for test
  
  if ($form_state['clicked_button']['#id'] == 'form-submit') {
    
    if (isset($form_state['storage']['mode']) && $form_state['storage']['mode'] == 'test') {

      if (empty($form_state['values']['test_mail'])) {
        form_set_error('test_mail', t('The "Test recipient" field is mandatory.'));
      }
      else if (!filter_var($form_state['values']['test_mail'], FILTER_VALIDATE_EMAIL)) {
        form_set_error('test_mail', t('The "Test recipient" field is not a valid e-mail address.'));
      }

      if (empty($form_state['values']['subject'])) {
        form_set_error('subject', t('The "E-mail subject" field is mandatory.'));
      }

      if (empty($form_state['values']['message'])) {
        form_set_error('message', t('The "E-mail message" field is mandatory.'));
      }
    }
  }

  // Validation for real
  
  if ($form_state['clicked_button']['#id'] == 'form-submit') {

    if (isset($form_state['storage']['mode']) && $form_state['storage']['mode'] == 'real') {

      if (empty($form_state['values']['subject'])) {
        form_set_error('subject', t('The "E-mail subject" field is mandatory.'));
      }

      if (empty($form_state['values']['message'])) {
        form_set_error('message', t('The "E-mail message" field is mandatory.'));
      }
    }
  }
}  

/**
 * Implements hook_form_submit
 */

function webform_mailing_form_submit($form, &$form_state) {

  // Variables retreived from the form
  
	$form_state['storage']['mode'] = $form_state['values']['mode'];
	$form_state['storage']['test_mail'] = $form_state['values']['test_mail'];
	$form_state['storage']['subject'] = $form_state['values']['subject'];
	$form_state['storage']['message'] = strip_tags($form_state['values']['message']);
	$form_state['storage']['message'] = str_replace("\r\n", '<br>', $form_state['storage']['message']);

  // Preparing the e-mail

  $subject = $form_state['storage']['subject'];
  $msg = $form_state['storage']['message'];
  $headers  = "From: Xarxanet <no-reply@xarxanet.org> \r\n";
  $headers .= "Content-type: text/html; charset=UTF-8\r\n";

  // Set the mode (for real or test)
  
  if ($form_state['clicked_button']['#id'] == 'mode-submit') {
    $form_state['storage']['mode'] = $form_state['values']['mode'];
  }

  // Clear the form
  
  if ($form_state['clicked_button']['#id'] == 'form-clear') {
    $form_state['storage'] = NULL;
  }

  // Send the mailing

  if ($form_state['clicked_button']['#id'] == 'form-submit') {
  	$count = 0;
    $nid = $form_state['storage']['nid'];
    $recipients = webform_mailing_get_recipients($nid);
    
    // For real
    
    if ($form_state['storage']['mode'] == 'real') {
      foreach ($recipients as $recipient) {
        $to = $recipient;
  	    mail($to, $subject, $msg, $headers);
  	    $count++;
  	  }
      drupal_set_message(t('Mailing sent successfully to @count recipients.', array('@count' => $count)), 'status');
    }

    // To Test recipient
    
    else {
      $to = $form_state['storage']['test_mail'];
      $subject = '[TEST E-MAIL] ' . $subject;
      mail($to, $subject, $msg, $headers);
      $count++;
      drupal_set_message('Test mailing sent successfully!', 'status');
    }
  }

  $form_state['rebuild'] = TRUE;
}
