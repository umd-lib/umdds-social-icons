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

    $use_all_accounts_link = !empty($blockConfig['use_all_accounts_link']);
    $all_accounts_link_text = !empty($blockConfig['all_accounts_link_text']) ? $blockConfig['all_accounts_link_text'] : t('View All Social Media');
    $all_accounts_link_url = !empty($blockConfig['all_accounts_link_url']) ? $blockConfig['all_accounts_link_url'] : '';

    $standalone_page_content = !empty($blockConfig['standalone_page_content']);


    return [
      '#theme' => 'umdds_social_icons',
      '#icons' => $icons,
      '#block_heading' => $block_heading,
      '#all_accounts_link_text' => $use_all_accounts_link ? $all_accounts_link_text : '',
      '#all_accounts_link_url' => $use_all_accounts_link ? $all_accounts_link_url : '',
      '#standalone_page_content' => $standalone_page_content,
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

    $form['standalone_page_content'] = [
      '#type' => 'checkbox',
      '#title' => t('Use as a standalone page content'),
      '#default_value' => !empty($config['standalone_page_content']) ? $config['standalone_page_content'] : 0,
    ];

    $form['core_services'] = [
      '#type' => 'details',
      '#title' => t('Core Services'),
      '#open' => TRUE,
    ];
    $form['core_services']['bluesky_url'] = [
      '#type' => 'textfield',
      '#title' => t('BlueSky URL'),
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
      '#default_value' =>  !empty($config['wordpress_url']) ? $config['wordpress_url'] : null,
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

     $form['use_all_accounts_link'] = [
      '#type' => 'checkbox',
      '#title' => t('Show “All Social Accounts” link'),
      '#default_value' => !empty($config['use_all_accounts_link']) ? $config['use_all_accounts_link'] : 0,
    ];
     $form['all_accounts_link_text'] = [
       '#type' => 'textfield',
       '#title' => t('All Social Accounts Link Text'),
      '#default_value' =>  !empty($config['all_accounts_link_text']) ? $config['all_accounts_link_text'] : null,
      '#states' => [
        'visible' => [
          ':input[name="settings[use_all_accounts_link]"]' => ['checked' => TRUE],
        ],
      ],
     ];
     $form['all_accounts_link_url'] = [
       '#type' => 'textfield',
       '#title' => t('All Social Accounts Link URL'),
      '#default_value' =>  !empty($config['all_accounts_link_url']) ? $config['all_accounts_link_url'] : null,
      '#states' => [
        'visible' => [
          ':input[name="settings[use_all_accounts_link]"]' => ['checked' => TRUE],
        ],
      ],
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
    $this->setConfigurationValue('use_all_accounts_link', $form_state->getValue('use_all_accounts_link'));
    $this->setConfigurationValue('all_accounts_link_text', $form_state->getValue('all_accounts_link_text'));
    $this->setConfigurationValue('all_accounts_link_url', $form_state->getValue('all_accounts_link_url'));
    $this->setConfigurationValue('standalone_page_content', $form_state->getValue('standalone_page_content'));
  }
}
