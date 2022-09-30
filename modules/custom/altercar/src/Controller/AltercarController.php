<?php
/**
 * @file
 * Contains \Drupal\altercar\Controller\AltercarController.
 */
namespace Drupal\altercar\Controller;
class AltercarController {
  public function content() {
  
  $current_user = \Drupal::currentUser();
  $user_fields = \Drupal::service('entity_field.manager')->getFieldDefinitions('user', 'fields');
  
  $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
  $user_car = $user->get('field_user_car')->getValue();
  
  $roles = $current_user->getRoles();


$uid = $current_user->id();

if (in_array('authenticated', $roles)) {
    return array(
      '#type' => 'markup',
      '#markup' => t('Num of users cars = '. sizeof($user_car) .''),
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
