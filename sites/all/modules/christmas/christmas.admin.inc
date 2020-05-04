<?php

/**
 * Implements hook_form
 */

function christmas_settings_form($form, &$form_state) {

  /**
  * Part I
  * 
  * Get all feeds from the BD and build a sortable list
  */

  $form['#tree'] = TRUE;
  
  $form['titol-nadal'] = array(
    '#type' => 'markup',
    '#markup' => '<h2>Selecció la data de nadal a Xarxanet</h2>',
  );
  
  $help  = '<p>';
  $help  = t('Les dates han de seguir el seguent format: dd-mm-yyyy (Ex: 31-03-2014)');
  $help .= '</p>';
  
    $form['view_feeds_top_help'] = array(
      '#type' => 'markup',
      '#markup' => $help,
    );

    $form['dataInici'] = array(
        '#type' => 'textfield', 
        '#title' => t('dataInici'),  
        '#size' => 60, 
        '#default_value' => variable_get('data_inici_christmas'),
        '#maxlength' => 128, 
        '#required' => TRUE,
    );

    $form['dataFinal'] = array(
        '#type' => 'textfield', 
        '#title' => t('dataFinal'),  
        '#size' => 60, 
        '#default_value' => (null !== variable_get('data_final_christmas') ) ? variable_get('data_final_christmas') : '',
        '#maxlength' => 128, 
        '#required' => TRUE,
    );

    $form['submit'] = array(
        '#type' => 'submit',
        '#attributes' => array('class' => array('btn btn-default btn-lg')),
        '#value' => t('Actualizar cambios'),
        '#id' => 'submit',
    );

  return $form;
}

/**
 * Implements hook_form_validate
 */

function christmas_settings_form_validate($form, &$form_state) {

  $values = $form_state['values'];

  // 'Update feeds' submit validation handler

  if ($form_state['clicked_button']['#id'] == 'submit') {

    $dataI=$values['dataInici'];
    $dataf=$values['dataFinal'];
    if (!validateDate($dataI)) {
        form_set_error('dataInici', t('Data inici incorrecte'));
    }
    if (!validateDate($dataf)) {
        form_set_error('dataFinal', t('Data de fi incorrecte'));
    }
  }
}

function validateDate($date, $format = 'd-m-Y')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

/**
 * Implements hook_form_submit
 */

function christmas_settings_form_submit($form, &$form_state) {
  
  $values = $form_state['values'];

  // 'Update feeds' submit handler
  
  if ($form_state['clicked_button']['#id'] == 'submit') {
    $errors_count = 0;
    
        variable_set('data_inici_christmas', $values['dataInici']);
        variable_set('data_final_christmas', $values['dataFinal']);
        drupal_set_message(t('La configuració s\'ha guardat correctament.'));

    }
}
