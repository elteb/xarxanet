<?php

/**
 * Implementation of hook_context_default_contexts().
 */
function vistes_2011_xarxanet_context_default_contexts() {
  $export = array();
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'agenda';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'agenda' => 'agenda',
        'events/*' => 'events/*',
        'agenda/*' => 'agenda/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'agenda',
      'subtitle' => 'agenda',
      'class' => 'agenda',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['agenda'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'ambiental';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'ambiental' => 'ambiental',
        'ambiental/*' => 'ambiental/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'ambiental',
      'subtitle' => 'ambiental',
      'class' => 'ambiental',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['ambiental'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'comunitari';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'comunitari' => 'comunitari',
        'comunitari/*' => 'comunitari/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'comunitari',
      'subtitle' => 'comunitari',
      'class' => 'comunitari',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['comunitari'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'cultural';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'cultural' => 'cultural',
        'cultural/*' => 'cultural/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'cultural',
      'subtitle' => 'cultural',
      'class' => 'cultural',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['cultural'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'economic';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'economic' => 'economic',
        'economic/*' => 'economic/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'economic',
      'subtitle' => 'economic',
      'class' => 'economic',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['economic'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'financaments';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'financaments' => 'financaments',
        'financaments/*' => 'financaments/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'financament',
      'subtitle' => 'financament',
      'class' => 'financament',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['financaments'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'formacio';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'formacio' => 'formacio',
        'formacio/*' => 'formacio/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'formacio',
      'subtitle' => 'formacio',
      'class' => 'formacio',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['formacio'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'informatic';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'informatic' => 'informatic',
        'informatic/*' => 'informatic/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'informatic',
      'subtitle' => 'informatic',
      'class' => 'informatic',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['informatic'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'internacional';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'internacional' => 'internacional',
        'internacional/*' => 'internacional/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'internacional',
      'subtitle' => 'internacional',
      'class' => 'internacional',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['internacional'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'juridic';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'juridic' => 'juridic',
        'juridic/*' => 'juridic/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'juridic',
      'subtitle' => 'juridic',
      'class' => 'juridic',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['juridic'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'noticies';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'noticies' => 'noticies',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'noticies',
      'subtitle' => 'noticies',
      'class' => 'noticies',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['noticies'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'projectes';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'projectes' => 'projectes',
        'projectes/*' => 'projectes/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'projectes',
      'subtitle' => 'projectes',
      'class' => 'projectes',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['projectes'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'recursos';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'recursos' => 'recursos',
        'recursos/*' => 'recursos/*',
        'recursos_tag' => 'recursos_tag',
        'recursos_tag/*' => 'recursos_tag/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'recursos',
      'subtitle' => 'recursos',
      'class' => 'recursos',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['recursos'] = $context;
  $context = new stdClass;
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'social';
  $context->description = '';
  $context->tag = 'equilibri, colors';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'social' => 'social',
        'social/*' => 'social/*',
      ),
    ),
  );
  $context->reactions = array(
    'theme' => array(
      'title' => 'social',
      'subtitle' => 'social',
      'class' => 'social',
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('equilibri, colors');

  $export['social'] = $context;
  return $export;
}
