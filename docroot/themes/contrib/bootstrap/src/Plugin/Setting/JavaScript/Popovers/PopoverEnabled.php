<?php
/**
 * @file
 * Contains \Drupal\bootstrap\Plugin\Setting\JavaScript\Popovers\PopoverEnabled.
 */

namespace Drupal\bootstrap\Plugin\Setting\JavaScript\Popovers;

use Drupal\bootstrap\Annotation\BootstrapSetting;
use Drupal\bootstrap\Plugin\Setting\SettingBase;
use Drupal\Core\Annotation\Translation;
use Drupal\Core\Form\FormStateInterface;

/**
 * The "popover_enabled" theme setting.
 *
 * @ingroup plugins_setting
 *
 * @BootstrapSetting(
 *   id = "popover_enabled",
 *   type = "checkbox",
 *   title = @Translation("Enable Bootstrap Popovers"),
 *   description = @Translation("Elements that have the <code>data-toggle=&quot;popover&quot;</code> attribute set will automatically initialize the popover upon page load. <strong class='error text-error'>WARNING: This feature can sometimes impact performance. Disable if pages appear to hang after initial load.</strong>"),
 *   defaultValue = 1,
 *   weight = -1,
 *   groups = {
 *     "javascript" = @Translation("JavaScript"),
 *     "popovers" = @Translation("Popovers"),
 *   },
 * )
 */
class PopoverEnabled extends SettingBase {

  /**
   * {@inheritdoc}
   */
  public function alterForm(array &$form, FormStateInterface $form_state, $form_id = NULL) {
    parent::alterForm($form, $form_state, $form_id);

    $group = $this->getGroup($form, $form_state);
    $group->setProperty('description', t('Add small overlays of content, like those on the iPad, to any element for housing secondary information.'));
  }

  /**
   * {@inheritdoc}
   */
  public function drupalSettings() {
    return !!$this->theme->getSetting('popover_enabled');
  }

}
