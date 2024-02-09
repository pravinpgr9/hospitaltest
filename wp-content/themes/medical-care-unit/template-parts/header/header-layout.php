<?php
/**
 * Header Layout
 * @package Medical Care Unit
 */

$medical_care_unit_default = medical_care_unit_get_default_theme_options();
?>
<header id="site-header" class="site-header-layout header-layout" role="banner">
    <div class="header-navbar">
        <div class="wrapper header-wrapper">
            <div class="theme-header-areas header-areas-left">
                <div class="header-titles">
                    <?php
                    medical_care_unit_site_logo();
                    medical_care_unit_site_description();
                    ?>
                </div>
            </div>
            <div class="theme-header-areas header-areas-right">
                <div class="site-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'medical-care-unit'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('medical-care-unit-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'medical-care-unit-primary-menu',
                                    )
                                );
                            } else {
                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'walker' => new medical_care_unit_Walker_Page(),
                                    )
                                );
                            } ?>
                        </ul>
                    </nav>
                </div>
                <div class="navbar-controls twp-hide-js">
                    <button type="button" class="navbar-control navbar-control-offcanvas">
                        <span class="navbar-control-trigger" tabindex="-1">
                            <?php medical_care_unit_the_theme_svg('menu'); ?>
                        </span>
                    </button>
                </div>
            </div>
            <?php
            $medical_care_unit_header_button_ed = get_theme_mod( 'medical_care_unit_header_button_ed', $medical_care_unit_default['medical_care_unit_header_button_ed'] ); 
                if( $medical_care_unit_header_button_ed ){ ?>
                <div class="theme-header-areas header-areas-right">
                    <?php $header_layout_button_text = esc_html( get_theme_mod( 'header_layout_button_text',$medical_care_unit_default['header_layout_button_text'] ) );
                        $header_layout_button_link = esc_html( get_theme_mod( 'header_layout_button_link' ) );

                        if( $header_layout_button_text || $header_layout_button_link ){ ?>
                        <a href="<?php echo esc_url( $header_layout_button_link ); ?>" class="btn-fancy btn-fancy-primary"><?php echo esc_html( $header_layout_button_text ); ?></a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</header>