<?php
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Theme\ThemeSettings;
use Drupal\system\Form\ThemeSettingsForm;
use Drupal\Core\Form;

function ci_xy_form_system_theme_settings_alter(&$form, FormStateInterface &$form_state, $form_id = NULL) {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  $opts = [
    '#type'          => 'entity_autocomplete',
    '#title'         => t("Call to Action Background"),
    '#description'   => t("Default call to action background media image; may be overridden on individual elements."),
    '#target_type'   => 'media',
    '#selection_settings' => ['target_bundles' => ['image']],
  ];
  if ($default_id = theme_get_setting('call_to_action_background')) {
    // element stores an int ID, but default value has to be the loaded entity
    $image = \Drupal::entityTypeManager()->getStorage('media')->load($default_id);
    $opts['#default_value'] = $image;
  }
  $form['call_to_action_background'] = $opts;

}		