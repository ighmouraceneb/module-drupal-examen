<?php


namespace Drupal\file_upload\Controller;


use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadFileController extends ControllerBase
{
  //Fonction permet de télécharger un fichier via une url
  public function downloadPdf($fileName) {
    $uri = 'public://my_files/'.$fileName;

    $headers = array(
      'Content-Type'     => 'application/pdf',
      'Content-Disposition' => 'attachment;filename="'.$fileName.'"');

    return new BinaryFileResponse($uri, 200, $headers, true);
  }


}
