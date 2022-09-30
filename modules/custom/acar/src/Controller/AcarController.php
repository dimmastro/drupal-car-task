<?php
/**
 * @file
 * Contains \Drupal\acar\Controller\AcarController.
 */
namespace Drupal\acar\Controller;
class AcarController {
  public function content() {
  
  $current_user = \Drupal::currentUser();
  $user_fields = \Drupal::service('entity_field.manager')->getFieldDefinitions('user', 'fields');
  
  $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
  $user_car = $user->get('field_user_car')->getValue();
  
  $roles = $current_user->getRoles();


$uid = $current_user->id();
//echo "<pre>";
//print_r($roles);
//echo "</pre>";
if (in_array('authenticated', $roles)) {
    return array(
      '#type' => 'markup',
      '#markup' => t('Num of users car = '. sizeof($user_car) .''),
    );

}else
{
    return array(
      '#type' => 'markup',
      '#markup' => t('Access denied'),
    );
}
  }
}
