<?php
/**
 * @file
 * Definition of Drupal\umdds_social_icons\Plugin\Block\UMDLibSocialIcons
 */

namespace Drupal\umdds_social_icons\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements the UMDLibSocialIcons 
 * 
 * @Block(
 *   id = "umdds_social_icons",
 *   admin_label = @Translation("UMD DS Social Icons"),
 *   category = @Translation("UMDDS"),
 * )
 */
class UMDDSSocialIcons extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $blockConfig = $this->getConfiguration();
    $block_heading = !empty($blockConfig['block_heading']) ? $blockConfig['block_heading'] : t('Stay Connected');
    $icons = [];
    if (!empty($blockConfig['bluesky_url'])) {
      $render_arr = [
        '#theme' => 'umdds_social_icons_bluesky',
        '#url' => $blockConfig['bluesky_url'],
      ];
      $icons[] = \Drupal::service('renderer')->render($render_arr);
    }
    if (!empty($blockConfig['facebook_url'])) {
      $render_arr = [
        '#theme' => 'umdds_social_icons_facebook',
        '#url' => $blockConfig['facebook_url'],
      ];
      $icons[] = \Drupal::service('renderer')->render($render_arr);
    }
    if (!empty($blockConfig['instagram_url'])) {
      $render_arr = [
        '#theme' => 'umdds_social_icons_instagram',
        '#url' => $blockConfig['instagram_url'],
      ];
      $icons[] = \Drupal::service('renderer')->render($render_arr);
    }
    if (!empty($blockConfig['mastodon_url'])) {
      $render_arr = [
        '#theme' => 'umdds_social_icons_mastodon',
        '#url' => $blockConfig['mastodon_url'],
      ];
      $icons[] = \Drupal::service('renderer')->render($render_arr);
    }
    if (!empty($blockConfig['pinterest_url'])) {
      $render_arr = [
        '#theme' => 'umdds_social_icons_pinterest',
        '#url' => $blockConfig['pinterest_url'],
      ];
      $icons[] = \Drupal::service('renderer')->render($render_arr);
    }
    if (!empty($blockConfig['threads_url'])) {
      $render_arr = [
        '#theme' => 'umdds_social_icons_threads',
        '#url' => $blockConfig['threads_url'],
      ];
      $icons[] = \Drupal::service('renderer')->render($render_arr);
    }
    if (!empty($blockConfig['tumblr_url'])) {
      $render_arr = [
        '#theme' => 'umdds_social_icons_tumblr',
        '#url' => $blockConfig['tumblr_url'],
      ];
      $icons[] = \Drupal::service('renderer')->render($render_arr);
    }
    if (!empty($blockConfig['wordpress_url'])) {
      $render_arr = [
        '#theme' => 'umdds_social_icons_wordpress',
        '#url' => $blockConfig['wordpress_url'],
      ];
      $icons[] = \Drupal::service('renderer')->render($render_arr);
    }
    if (!empty($blockConfig['youtube_url'])) {
      $render_arr = [
        '#theme' => 'umdds_social_icons_youtube',
        '#url' => $blockConfig['youtube_url'],
      ];
      $icons[] = \Drupal::service('renderer')->render($render_arr);
    }
    if (!empty($blockConfig['muskweb_url'])) {
      $render_arr = [
        '#theme' => 'umdds_social_icons_muskweb',
        '#url' => $blockConfig['muskweb_url'],
      ];
      $icons[] = \Drupal::service('renderer')->render($render_arr);
    }

    return [
      '#theme' => 'umdds_social_icons',
      '#icons' => $icons,
      '#block_heading' => $block_heading,
      '#cache' => [
        'max-age' => 3600,
      ]
    ];
  }

  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $form['#tree'] = TRUE;
    $config = $this->getConfiguration();

    $form['block_heading'] = [
      '#type' => 'textfield',
      '#title' => t('Block Heading'),
      '#default_value' =>  !empty($config['block_heading']) ? $config['block_heading'] : null,
    ];
    $form['core_services'] = [
      '#type' => 'details',
      '#title' => t('Core Services'),
      '#open' => TRUE,
    ];
    $form['core_services']['bluesky_url'] = [
      '#type' => 'textfield',
      '#title' => t('BlueSky URL'),
      '#description' => t('Not yet implemented.'),
      '#default_value' =>  !empty($config['bluesky_url']) ? $config['bluesky_url'] : null,
    ];
    $form['core_services']['facebook_url'] = [
      '#type' => 'textfield',
      '#title' => t('Facebook URL'),
      '#default_value' =>  !empty($config['facebook_url']) ? $config['facebook_url'] : null,
    ];
    $form['core_services']['instagram_url'] = [
      '#type' => 'textfield',
      '#title' => t('Instagram URL'),
      '#default_value' =>  !empty($config['instagram_url']) ? $config['instagram_url'] : null,
    ];
    $form['core_services']['mastodon_url'] = [
      '#type' => 'textfield',
      '#title' => t('Mastodon URL'),
      '#default_value' =>  !empty($config['mastodon_url']) ? $config['mastodon_url'] : null,
    ];
    $form['core_services']['pinterest_url'] = [
      '#type' => 'textfield',
      '#title' => t('Pinterest URL'),
      '#default_value' =>  !empty($config['pinterest_url']) ? $config['pinterest_url'] : null,
    ];
    $form['core_services']['wordpress_url'] = [
      '#type' => 'textfield',
      '#title' => t('Wordpress URL'),
      '#default_value' =>  !empty($config['instagram_url']) ? $config['instagram_url'] : null,
    ];
    $form['core_services']['youtube_url'] = [
      '#type' => 'textfield',
      '#title' => t('YouTube URL'),
      '#default_value' =>  !empty($config['youtube_url']) ? $config['youtube_url'] : null,
    ];

    $form['alt_services'] = [
      '#type' => 'details',
      '#title' => t('Alternative Services'),
      '#open' => FALSE,
    ];
    $form['alt_services']['threads_url'] = [
      '#type' => 'textfield',
      '#title' => t('Threads URL'),
      '#description' => t('Not yet implemented.'),
      '#default_value' =>  !empty($config['threads_url']) ? $config['threads_url'] : null,
    ];
    $form['alt_services']['tumblr_url'] = [
      '#type' => 'textfield',
      '#title' => t('Tumblr URL'),
      '#default_value' =>  !empty($config['tumblr_url']) ? $config['tumblr_url'] : null,
    ];
    $form['alt_services']['muskweb_url'] = [
      '#type' => 'textfield',
      '#title' => t('X URL'),
      '#default_value' =>  !empty($config['muskweb_url']) ? $config['muskweb_url'] : null,
      '#description' => t('Note that BlueSky or Mastadon offer similar functionality.'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $vals = $form_state->getValues();
    $this->setConfigurationValue('block_heading', $form_state->getValue('block_heading'));
    $this->setConfigurationValue('pinterest_url', $vals['core_services']['pinterest_url']);
    $this->setConfigurationValue('wordpress_url', $vals['core_services']['wordpress_url']);
    $this->setConfigurationValue('youtube_url', $vals['core_services']['youtube_url']);
    $this->setConfigurationValue('facebook_url', $vals['core_services']['facebook_url']);
    $this->setConfigurationValue('instagram_url', $vals['core_services']['instagram_url']);
    $this->setConfigurationValue('bluesky_url', $vals['core_services']['bluesky_url']);
    $this->setConfigurationValue('mastodon_url', $vals['core_services']['mastodon_url']);
    $this->setConfigurationValue('tumblr_url', $vals['alt_services']['tumblr_url']);
    $this->setConfigurationValue('threads_url', $vals['alt_services']['threads_url']);
    $this->setConfigurationValue('muskweb_url', $vals['alt_services']['muskweb_url']);
  }
}
