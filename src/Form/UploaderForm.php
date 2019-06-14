<?php

namespace Drupal\file_upload\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\file\Entity\File;

class UploaderForm extends FormBase
{
  public function getFormId()
  {
    return 'uploader_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {

    $form = array();
    $form['file_upload'] = [
      '#type' => 'managed_file',
      '#name' => 'my_file',
      '#title' => $this->t('Upload file'),
      '#size' => 20,
      '#description' => t('PDF format only'),
      '#upload_validators' => ['file_validate_extensions' => array('pdf')],
      '#upload_location' => 'public://my_files/',
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('Submit'),
    ];




    return $form;
  }


  public function submitForm(array &$form, FormStateInterface $form_state)
  {

    $form_file = $form_state->getValue('file_upload', 0);

    if (isset($form_file[0]) && !empty($form_file[0])) {
      $file_upload = File::load($form_file[0]);
      $file_upload->setPermanent();
      $file_upload->save();
      drupal_set_message('File successfully uploaded.');
    }

  }


  public function validateForm(array &$form, FormStateInterface $form_state)
  {

    if ($form_state->getValue('file_upload') == NULL) {
      $form_state->setErrorByName('my_file', $this->t('Upload file.'));
    }

   // delete old file
    /*
     $storage = \Drupal::entityTypeManager()->getStorage('file');
    $files = $storage->loadMultiple();
    if($files)
    {
      foreach ($files as $file) {
        $file->delete();
      }
    }*/
  }


}
