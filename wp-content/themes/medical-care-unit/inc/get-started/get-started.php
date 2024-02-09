<?php
/**
 * Added Omega Page. */

/**
 * Add a new page under Appearance
 */
function medical_care_unit_menu()
{
	add_theme_page(__('Omega Options', 'medical-care-unit'), __('Omega Options', 'medical-care-unit'), 'edit_theme_options', 'medical-care-unit-theme', 'medical_care_unit_page');
}
add_action('admin_menu', 'medical_care_unit_menu');

/**
 * Enqueue styles for the help page.
 */
function medical_care_unit_admin_scripts($hook)
{
	wp_enqueue_style('medical-care-unit-admin-style', get_template_directory_uri() . '/inc/get-started/get-started.css', array(), '');
}
add_action('admin_enqueue_scripts', 'medical_care_unit_admin_scripts');

/**
 * Add the theme page
 */
function medical_care_unit_page(){
$medical_care_unit_user = wp_get_current_user();
$medical_care_unit_theme = wp_get_theme();
?>
<div class="das-wrap">
  <div class="medical-care-unit-panel header">
    <div class="medical-care-unit-logo">
      <span></span>
      <h2><?php echo esc_html( $medical_care_unit_theme ); ?></h2>
    </div>
    <p>
      <?php
            $medical_care_unit_theme = wp_get_theme();
            echo wp_kses_post( apply_filters( 'omega_theme_description', esc_html( $medical_care_unit_theme->get( 'Description' ) ) ) );
          ?>
    </p>
    <a class="btn btn-primary" href="<?php echo esc_url(admin_url('/customize.php?'));
?>"><?php esc_html_e('Edit With Customizer - Click Here', 'medical-care-unit'); ?></a>
  </div>

  <div class="das-wrap-inner">
    <div class="das-col das-col-7">
      <div class="medical-care-unit-panel">
        <div class="medical-care-unit-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('If you are facing any issue with our theme, submit a support ticket here.', 'medical-care-unit'); ?></h3>
          </div>
          <a href="<?php echo esc_url( MEDICAL_CARE_UNIT_SUPPORT_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Theme Support.', 'medical-care-unit'); ?></a>
        </div>
      </div>
      <div class="medical-care-unit-panel">
        <div class="medical-care-unit-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Please write a review if you appreciate the theme.', 'medical-care-unit'); ?></h3>
          </div>
          <a href="<?php echo esc_url( MEDICAL_CARE_UNIT_REVIEW_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Rank this topic.', 'medical-care-unit'); ?></a>
        </div>
      </div>
       <div class="medical-care-unit-panel">
        <div class="medical-care-unit-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our lite theme documentation to set up our lite theme as seen in the screenshot.', 'medical-care-unit'); ?></h3>
          </div>
          <a href="<?php echo esc_url( MEDICAL_CARE_UNIT_LITE_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Documentation.', 'medical-care-unit'); ?></a>
        </div>
      </div>
    </div>
    <div class="das-col das-col-3">
      <div class="upgrade-div">
        <p>
          <strong>
            <?php esc_html_e('Premium Features Include:', 'medical-care-unit'); ?>
          </strong>
          </h4>
        <ul>
          <li>
          <?php esc_html_e('One Click Demo Content Importer', 'medical-care-unit'); ?>
          </li>
          <li>
          <?php esc_html_e('Woocommerce Plugin Compatibility', 'medical-care-unit'); ?>
          </li>
          <li>
          <?php esc_html_e('Multiple Section for the templates', 'medical-care-unit'); ?>            
          </li>
          <li>
          <?php esc_html_e('For a better user experience, make the top of your menu sticky.', 'medical-care-unit'); ?>  
          </li>
        </ul>
        <div class="text-center">
          <a href="<?php echo esc_url( MEDICAL_CARE_UNIT_BUY_NOW ); ?>" target="_blank"
            class="btn btn-success"><?php esc_html_e('Upgrade Pro $40', 'medical-care-unit'); ?></a>
        </div>
      </div>
      <div class="medical-care-unit-panel">
        <div class="medical-care-unit-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Kindly view the premium themes live demo.', 'medical-care-unit'); ?></h3>
          </div>
          <a class="btn btn-primary demo" href="<?php echo esc_url( MEDICAL_CARE_UNIT_DEMO_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Live Demo.', 'medical-care-unit'); ?></a>
        </div>
        <div class="medical-care-unit-panel-content pro-doc">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our pro theme documentation to set up our premium theme as seen in the screenshot.', 'medical-care-unit'); ?></h3>
          </div>
          <a href="<?php echo esc_url( MEDICAL_CARE_UNIT_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-primary demo"><?php esc_html_e('Pro Documentation.', 'medical-care-unit'); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}