<?php


namespace Drupal\prueba\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure prueba settings for this site.
 */
class PruebaForm extends ConfigFormBase {

  /** 
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'prueba.settings';

  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'prueba_admin_settings';
  }

  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /** 
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);

    $form['prueba_thing'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Clave de API Bits'),
      '#default_value' => $config->get('prueba_thing'),
    ];  

    // $form['other_things'] = [
    //   '#type' => 'textfield',
    //   '#title' => $this->t('Other things'),
    //   '#default_value' => $config->get('other_things'),
    // ];  

    return parent::buildForm($form, $form_state);
  }

  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
    $this->configFactory->getEditable(static::SETTINGS)
      // Set the submitted configuration setting.
      ->set('prueba_thing', $form_state->getValue('prueba_thing'))
      // You can set multiple configurations at once by making
      // multiple calls to set().
      ->set('other_things', $form_state->getValue('other_things'))
      ->save();

    parent::submitForm($form, $form_state);
  }


 

}
