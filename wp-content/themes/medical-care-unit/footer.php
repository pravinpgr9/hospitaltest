<?php
/**
 * The template for displaying the footer
 * @package Medical Care Unit
 * @since 1.0.0
 */

/**
 * Toogle Contents
 * @hooked medical_care_unit_content_offcanvas - 30
*/

do_action('medical_care_unit_before_footer_content_action'); ?>

</div>

<footer id="site-footer" role="contentinfo">

    <?php
    /**
     * Footer Content
     * @hooked medical_care_unit_footer_content_widget - 10
     * @hooked medical_care_unit_footer_content_info - 20
    */

    do_action('medical_care_unit_footer_content_action'); ?>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
