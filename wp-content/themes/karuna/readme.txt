=== Karuna ===

Contributors: automattic
Requires at least: 4.3
Tested up to: 4.6.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

Karuna is a clean business theme designed with health and wellness-focused sites in mind. With bright, bold colors, prominent featured images, and support for customer testimonials, your business' brand will shine with Karuna.


== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New affinity.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.


== Setting Up Your Front Page ==

When you first activate Karuna, your homepage displays posts in a traditional blog format. To set up your homepage, follow these steps:

1) Create a page.
2) Go to the Customizer’s Static Front Page panel and set “Front page displays” to “A static page.”
3) Select the page created in Step One as “Front page,” and choose another page as “Posts page” to display your blog posts.

Karuna's front page displays, in order:

* The site header;
* the page title and content, if set;
* two recent user Testimonials (requires Jetpack: http://jetpack.com);
* the four most recent Posts;
* and the site footer.


== Featured Images / Custom Header ==

Karuna supports prominent Featured Images on the blog, single posts, and pages.

* On blog posts -- 624 pixels wide maximum by unlimited height.
* On single posts and pages -- full-screen width, unlimited height.

On single posts and pages, if no Featured Image is set, the Custom Header will be displayed instead.


== Custom Menus ==

-- Main Menu --

This theme has one main menu area called "Header." If you don't assign a custom menu to that area, your site's default page menu is displayed instead.

-- Social Links --

Karuna supports a Jetpack Social Links (jetpack.com) menu, which appears in the footer. Linking to any of the following sites will automatically display its icon in your menu:

CodePen					Digg
Dribbble				Dropbox
Facebook				Flickr
github 					Google+
Instagram				LinkedIn
Email (mailto: links)	Pinterest
Pocket					Polldaddy
Reddit					RSS Feed (urls with /feed/)
StumbleUpon				Tumblr
Twitter					Vimeo
WordPress				YouTube


== Widgets ==

-- Sidebar --

Karuna has a one-column or two-column layout. Add widgets to the sidebar area for a traditional two-column blog, or leave it blank for a sleek one-column style.

-- Full-Width Header --

This area, displayed under the site header, is a great place for a callout using a Text widget.

-- Full-Width Footer --

This area, displayed after your content and before the four optional footer widget areas, is a great space for a large video or photo gallery widget.

-- Footer Widget Areas --

Karuna also includes up to four optional widget areas in the footer.

Configure these widget areas from Customize → Widgets.


== Testimonials ==

Download Jetpack http://jetpack.com/ to activate this feature. Karuna features testimonials in two ways:

* The dedicated testimonial archive page displays all testimonials in reverse chronological order, with the newest displayed first.
* The Testimonial Shortcode allows you to display the testimonials wherever you want on your site.

To add a testimonial, go to Testimonials → Add New in your WP Admin dashboard. Testimonials are composed of the testimonial text, the name of the customer — added as testimonial title — and an image or logo, which can be added as a Featured Image.

-- Testimonial Archive Page --

The testimonial archive page can be found at https://karunademo.wordpress.com/testimonial/ — just replace https://karunademo.wordpress.com/ with the URL of your website. All testimonials are displayed on the testimonial archive page, which can be added to a Custom Menu using the Links Panel.

This page can be further customized by adding a title, intro text, and featured image via Customizer → Testimonials. This content will appear above the testimonials list.


== Page Templates ==

Karuna comes with a Full-Width, No Sidebar Page Template to give you more space for your content. It’s the perfect way to showcase a large gallery of images or a video.


== Extras ==

Karuna comes with a special CSS style for buttons. You can add the button class to your links in the HTML Editor or a Text Widget to create “call to action” buttons.

Sample code:
<a href="https://karunademo.wordpress.com/" class="button">Button</a>


== Additional Support ==

Karuna also supports the following features:

* Custom Logo
* Custom Backgrounds


== Quick Specs (all measurements in pixels) ==

* The main column width is 624, except on the full-width template, where it's 1040.
* The main sidebar width is 260.
* The full-width Header and Footer widget areas are a maximum of 1040 wide.
* The four optional footer widget areas' widths vary depending on the number of active areas.
* Featured Images are displayed at full-screen width and variable height on single posts and pages.
* The site logo appears at a maximum width of 500 and height of 100.
* The custom header appears at full-screen width with flexible height.


== Credits/Licenses ==

* Based on Components http://components.underscores.me/, (C) 2015-2017 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2017 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
* Genericons font by Automattic, http://genericons.com/ (Font: SIL OFL 1.1, CSS: MIT License)
* Default Custom Header images all from Unsplash, CC0 license (https://unsplash.com/license)
-- Julia Caesar / https://unsplash.com/photos/asct7UP3YDE
-- Johnson Wang / https://unsplash.com/photos/qG-hPxoAnRE
-- Alesah Villalon / https://unsplash.com/photos/N-BdZE5HyMg
* Images in screenshot and demo site from http://unsplash.com/, CC0 license (https://unsplash.com/license)
* Video on demo site from videos.pexels.com, CC0 license


== Changelog ==

= 6 July 2018 =
* Adds extra padding underneath the Testimonials on the Front Page, so longer names don't clash with the photos.

= 26 April 2018 =
* Add support for the new WC 3.3+ Customizer options

= 5 April 2018 =
* Optimize images

= 15 March 2018 =
* Adjust content width when full-width header or footer widget areas are active so tiled galleries take up the full width of the column. Remove deprecrated Jetpack function to control content width as this is now handled by core.

= 7 March 2018 =
* Improve contact form appearance.
* Add styling for the Payment Methods table on the Pay for order page

= 5 March 2018 =
* Fix My Account buttons spacing issue

= 3 March 2018 =
* Use wp_kses_post rather than wp_filter_post_kses.

= 23 February 2018 =
* Fix the issue with product gallery images becoming taller on hover

= 22 February 2018 =
* Revert the fix for the issue with product gallery images becoming taller on hover
* Fix the issue with product gallery images becoming taller on hover

= 21 February 2018 =
* Fix the incorrect WooCommerce image sizes
* Define WooCommerce image sizes

= 5 February 2018 =
* Add clearfix to testimonials.

= 1 February 2018 =
* Add option to hide Recent Posts on the static front page; set to 'on' so existing sites continue to work as usual.

= 15 January 2018 =
* Simplify Headstart annotations for all themes in signup.

= 24 November 2017 =
* Overwrite `figure` margin left/right. Should be 0 but normalize changes it to 40px.

= 5 October 2017 =
* Adds full WooCommerce integration.

= 29 September 2017 =
* Update version number in preparation for .org submission

= 27 September 2017 =
* Ensure Simple Payments button appears under the main navigation when it's sticking to the top of the page.

= 1 September 2017 =
* Ensure sticky header height is correctly calculated and added as padding to the body tag when header is stuck.

= 28 August 2017 =
* Tweak headstart annotations to prevent bkismet error.

= 25 August 2017 =
* Update version number in preparation for .org submission

= 24 August 2017 =
* Fix path to full-width page template when we check the $content_width so it sets the proper wide content width on full-width pages.
* Ensure current page and menu items have sufficient contrast with the background color.
* Minor tweak to media queries in Karuna color annotations to fix issue where submenus on iPads in portrait mode became transparent when using a custom color scheme.
* Update Headstart annotations to include a sample button link for better visual understanding/UX.
* Ensure inline buttons display inline-block so they don't overlap next/previous lines.

= 22 August 2017 =
* Remove unnecessary margins on figure elements in the Image widget.

= 30 June 2017 =
* Add hover styles to footer widgets to give users feedback.
* Add hover effect to links in header widget area to give user feedback.

= 30 May 2017 =
* Adjust edit link styles for Testimonials on front page, so the image doesn't overlap the testimonial link when users aren't logged in.

= 26 April 2017 =
* Add support for Smarter Featured Images, off by default.

= 19 April 2017 =
* Update WooCommerce support to 3.0

= 31 March 2017 =
* Fix social menu size
* Use SVG for social menu
* Fix gallery-item margin/padding.

= 30 March 2017 =
* Make CSS transformation work in every modern browsers
* Use tabs instead of spacing in stylesheet
* Add support for WooCommerce

= 22 March 2017 =
* add Custom Colors annotations directly to the theme
* move fonts annotations directly into the theme

= 6 March 2017 =
* Update version number in preparation for .org submission
* Fix path to Genericons stylesheet for self-hosted users;

= 21 February 2017 =
* Prepare for core custom logo support.

= 7 February 2017 =
* Replace get_the_tag_list() with the_tags() for a more straightforward approach that prevents potential fatal errors.

= 17 January 2017 =
* Make sure karuna_jetpack_gallery_widget_width() returns $width.

= 30 December 2016 =
* Add check to make sure narrow content width is not applied to static front page when there are no sidebar widgets.

= 30 November 2016 =
* Fix Content Options Featured Images undeclared variable by adding extra check to make sure variable is set

= 29 November 2016 =
* Hide author bio by default

= 28 November 2016 =
* Add support for Content Options

= 10 November 2016 =
* Add Headstart translations (strand ID 9901).

= 26 October 2016 =
* Make sure we're using a URL that belongs to us in HS annotation Testimonials text.

= 4 October 2016 =
* Add the new `fixed-menu` feature tag to the stylesheet.

= 26 July 2016 =
* Set specific button colour and border colour for footer widgets, so they're visible against the purple background.
* Update Sass files to match .css file.
* Tweak styles so width applied when .no-sidebar class is present isn't applied to the full width template. It was causing that template to not actually be full-width.

= 7 July 2016 =
* Update version number for screenshot update.
* Downsize screenshot to 1200px wide to match .org standards
* Update readme with info about default custom headers in preparation for submission to .org

= 6 July 2016 =
* Add a couple more default custom header images.
* Add new default header images.

= 5 July 2016 =
* Removing author-bio and blog-excerpts tags for launch; these features will be available when Content Options is ready.
* Make sure site title area has more room to breathe; update readme with source for default header image.

= 4 July 2016 =
* Add a default custom header in the custom header setup.
* Add default header images and thumbnail.

= 1 July 2016 =
* Make sure both main nav and branding have margins to avoid running into each other.
* use flex for site branding and navigation to allow more menu items when a short site title is present.
* Make entry titles break on smaller screens to avoid overflow
* Ensure site header when sticky displays over DM icons
* Improve spacing between widgets in header widget area; only center text in that area for text widgets.
* Ensure edit links clear surrounding content.
* Add margin to header image DM icon to push it down away from the menus
* ensure Testimonials archive page content ccan span the full width of the page if need be.
* Adding Headstart annotations.

= 30 June 2016 =
* Ensure infinite handle button has bottom margin
* Only apply transitions to opacity property on submenus to avoid shifting on hover.
* Ensure comment edit links don't float; adjust RTL styles for floated edit links.
* Ensure edit links are floated rather than aligned to the right.
* Reduce bottom margin on comment metadata
* Improved spacing around widget areas and comments area on mobile devices
* Cleaner styles for comment reply title
* Add author-bio and blog-excerpts tags to style.css
* Update readme to match Showcase
* Make sure author grid widget displays like a grid
* Style image captions
* More specific rules for lists in specific widgets to avoid odd behavior.
* Ensure top bar padding is smaller if no social links or site description are present.
* Ensure infinite scroll button outline and text transition at the same rate.
* Remove unnecessary editor styles function; enqueue Google Fonts explicitly through https; Add brackets around IF statement for Testimonials archive so the fallback archive title shows up.
* Add theme description to readme and style.css
* Add screenshot.png
* Align social links to the middle of the top bar
* Increase social links font size.

= 29 June 2016 =
* Remove overflow on widgets, which causes issues in Firefox; Adding support for Jetpack Content Settings.

= 28 June 2016 =
* Don't display date on Sticky posts
* Updates for TUX consistency; rename menu to reflect position, and re-ID menu for better compatibility on theme switch. Begin updating readme
* Add POT; update footer credit to point to theme showcase
* Remove unnecessary whitespace
* Account for transforms in RTL styles
* Begin adding RTL styles

= 27 June 2016 =
* Make sure Testimonials archive displays the Testimonials jetpack options properly; remove post formats support
* Make sure menu toggle button stays centered.
* Begin styling navigation menu on mobile devices
* Increase comment avatar size
* Don't align edit links to the right for comments
* Ensure full-width footer widget area has padding on narrower screens
* Make sure widget contents don't overflow

= 23 June 2016 =
* Make sure we're using the same content width across all widget areas and sections.
* Improvements to size of sticking header so it doesn't take up so much vertical space. Smoother transitions for site title and logo as well.
* Ensure sticky header only appears at wide browser widths.
* Don't need to subtract box shadow value from sticky header height if we're hiding the top bar while we scroll
* Smoother scrolling for sticky header
* Adjustments to smooth sticky header behavior

= 10 June 2016 =
* Reduce max height of site logo by 20px to save on vertical height
* Darken the single post navigation borders slightly
* Increase social links font size slightly
* Adjustments to heading font sizes in some places when on smaller screens
* Improve styles for callout buttons in the header widget area
* Better styles for the front page content
* Begin styling the header on mobiles

= 9 June 2016 =
* Better alignment for images in the Instagram widget.
* Full-Width Header widget area has a new title; better styles for widgets in the full-width widget areas if users add more than one widget.
* Add tags to style.css and readme
* Adjust font sizes for small screens in comments and page titles
* Adjust widget font sizes for small screens
* Adjust font sizes for small screens
* Reduce blockquote font sizes
* Adjust heading styles for smaller screens
* Increase allowed size of uploaded logo file but display at half the size for retina screens.

= 8 June 2016 =
* Account for admin bar on site header when sticking; reduce padding so it doesn't cover as much of the available vertical space.
* Add temporary readme.txt; adjust featured image block status
* Add fallback to support IE 10
* Simplify front page posts by using flexbox rather than Masonry

= 7 June 2016 =
* Position edit links to the right for all post types
* Ensure main navigation is vertically centered using flex
* Change triangles to arrows for main navigation
* Let's ignore sticky posts in the recent posts area so we only get 4 posts every time; fix custom header to display block after having removed link wrapper; nicer transitions on sticky menu
* Improving styles and behavior of sticky menu
* Begin adding sticky header functionality
* Add triangle submenu arrows for main navigation menu.
* Adjust ratings font size
* Make sure WP.com-specific styles are enqueued
* Begin styling custom logo and fix bug where site title wouldn't reappear in the CUstomizer when hidden.
* Begin adding single post nav styles and structure; add icon to menu toggle on small screens.
* Begin styling single post navigation; add Genericons support for Menu Toggle icon.
* Adjust media queries to increase right and left padding, remove grid template styles
* Remove unused content-grid.php template
* Remove confusing Grid Page template
* Rename page templates directory from page-templates to templates
* Remove link from around custom header/featured header images
* Remove customized post heading from front page template
* Add two more footer widget areas (optional), move the front page footer widgets to footer.php to be used on all pages if active, adjust styles for all these widget areas, remove "Top" from menu toggle button title, remove theme option for Recent Posts area heading, and remove widgets from 404 page.

= 3 June 2016 =
* Only allow users to change color of site title, not site description
* Fix padding/standardize spacing on top bar/header area.
* Adjust padding and spacing on various page templates for consistency and better readability.
* Better alignment for main navigation with site title
* Style sites without widgets such that content area is centered; style infinite scroll older posts button to match other buttons; add $themecolors for WP.com
* Add class when the sidebar is active
* Minor CSS adjustments
* Only show page-template-front-page class when on the front page but not the blog page
* Only apply .page-template-front-page to the theme if the correct page template is used..
* Initial commit to free themes repo
