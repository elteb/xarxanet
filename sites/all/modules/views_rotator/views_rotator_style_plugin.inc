<?php
// $Id: views_rotator_style_plugin.inc,v 1.1 2008/09/23 02:28:12 mfer Exp $

/**
  * Implementation of views_plugin_style().
  */
class views_rotator_style_plugin extends views_plugin_style {

  /**
   * Set default options
   */
  function options(&$options) {
    $options['timeout'] = 5;
    $options['speed'] = 1;
    $options['pause'] = 0;
    $options['back_next_buttons'] = 0;
	$options['menu'] = 1;
    $options['height'] = '';
  }

  function options_form(&$form, &$form_state) {
    $form['timeout'] = array(
      '#type' => 'textfield',
      '#title' => t('Time between displaying items'),
      '#size' => 10,
      '#maxlength' => 60,
      '#default_value' => $this->options['timeout'],
      '#description' => t('The time in seconds.'),
    );
    $form['back_next_buttons'] = array(
      '#type' => 'checkbox',
      '#title' => t('Display back and next buttons when the mouse is over the area.'),
      '#default_value' => $this->options['back_next_buttons'],
    );
	$form['menu'] = array(
      '#type' => 'checkbox',
      '#title' => t('Display a menu when the mouse is over the area.'),
      '#default_value' => $this->options['menu'],
    );
	$form['menu_left'] = array(
      '#type' => 'textfield',
      '#title' => t('Left'),
	  '#description' => t('Set left position for menu without "px". Menu starts in the bottom right corner.'),
      '#default_value' => $this->options['menu_left'],
    );$form['menu_top'] = array(
      '#type' => 'textfield',
      '#title' => t('Top'),
	  '#description' => t('Set top position for menu without "px". Menu starts in the bottom right corner.'),
      '#default_value' => $this->options['menu_top'],
    );
    /*$form['height'] = array(
      '#type' => 'textfield',
      '#title' => t('Height of container'),
      '#size' => 10,
      '#maxlength' => 60,
      '#default_value' => $this->options['height'],
      '#description' => t('If the height is left empty Views Rotator will attempt to detect the height. Enter a height as auto or a value in px or em to specify a height via CSS.'),
    );*/
  }
}