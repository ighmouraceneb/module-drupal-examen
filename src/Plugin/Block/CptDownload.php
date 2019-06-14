<?php
/**
 * Created by PhpStorm.
 * User: Stagiaire
 * Date: 14/06/2019
 * Time: 15:52
 */

namespace Drupal\file_upload\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a hello block.
 *
 * @Block(
 *  id = "ctpdownload_block",
 *  admin_label = @Translation("Nember download!")
 * )
 */
class CptDownload extends  BlockBase
{
  //Affichage de nombre de fois un fichier a été téléchargé
   public function build()
   {
     $build = [
       '#markup' => $this->t('The file YYYY has been downloaded XXX times', [
       ]),
     ];
     return $build;
   }
}
