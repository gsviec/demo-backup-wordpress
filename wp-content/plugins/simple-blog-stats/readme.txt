=== Simple Blog Stats ===

Plugin Name: Simple Blog Stats
Plugin URI: https://perishablepress.com/simple-blog-stats/
Description: Provides shortcodes and template tags to display a variety of statistics about your site.
Tags: categories, comments, drafts, pages, posts, recent comments, recent posts, statistics, stats, tags, users
Author: Jeff Starr
Author URI: https://plugin-planet.com/
Donate link: http://m0n.co/donate
Contributors: specialk
Requires at least: 4.1
Tested up to: 4.7
Stable tag: 20161118
Version: 20161118
Text Domain: simple-blog-stats
Domain Path: /languages
License: GPL v2 or later

Displays a wealth of useful statistics about your site.



== Description ==

[Simple Blog Stats](https://perishablepress.com/simple-blog-stats/) (SBS) provides shortcodes and tags to display site stats in posts, pages, and anywhere in your theme.

**Statistics include:**

* Total number of posts
* Total number of pages
* Total number of drafts
* Total number of comments
* Number of comments in moderation
* Number of approved comments
* Number of registered users
* Number of categories
* Number of tags
* NEW! Number of words for any post
* NEW! Number of words for all posts

**Core Features:**

* Provides shortcodes to display stats in Posts and Pages
* Provides template tags to display stats anywhere in your theme
* Configure text/markup to appear before and/or after each shortcode
* Built with the WP API for optimal performance and security
* Provides slick settings screen with toggling panels
* Provides option to restore default plugin settings
* Displays your stats with clean, valid markup

**More Features:**

* Display date of most recent site update
* Display list of recent posts (configurable)
* Display list of recent comments (configurable)
* Display all blog stats in a nicely formatted list
* Configure all shortcodes via the plugin settings
* Eat a bowl of ice cream :)



== Installation ==

**Installation**

1. Upload the plugin to your blog and activate
2. Visit the settings to configure your options

[More info on installing WP plugins](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)


**Usage**

Visit the SBS settings page to configure your shortcodes. Then copy/paste the shortcodes in any Post, Page, or Widget to display your stats. To display your stats anywhere in your theme template, visit the Template Tags section of the settings page.


**Upgrades**

To upgrade SBS, remove the old version and replace with the new version. Or just click "Update" from the Plugins screen and let WordPress do it for you automatically.

__Note:__ uninstalling the plugin from the WP Plugins screen results in the removal of all settings from the WP database. 


**Restore Default Options**

To restore default plugin options, either uninstall/reinstall the plugin, or visit the plugin settings &gt; Restore Default Options.


**Uninstalling**

Simple Blog Stats cleans up after itself. All plugin settings will be removed from your database when the plugin is uninstalled via the Plugins screen.



== Upgrade Notice ==

To upgrade SBS, remove the old version and replace with the new version. Or just click "Update" from the Plugins screen and let WordPress do it for you automatically.

__Note:__ uninstalling the plugin from the WP Plugins screen results in the removal of all settings from the WP database. 



== Screenshots ==

1. Simple Blog Stats: Settings Screen (panels toggle open/closed)

More screenshots and information available at the [SBS Homepage](https://perishablepress.com/simple-blog-stats/).



== Frequently Asked Questions ==

**How do I use the count-word shortcode?**

There are three ways to count words:

	[sbs_word_count]        displays word count of current post
	[sbs_word_count id="1"] displays word count of post with ID = 1
	[sbs_word_count_all]    displays word count for all published posts


**Got a question?**

Send any questions or feedback via my [contact form](https://perishablepress.com/contact/). Thanks! :)



== Support development of this plugin ==

I develop and maintain this free plugin with love for the WordPress community. To show support, you can [make a cash donation](http://m0n.co/donate), [bitcoin donation](http://m0n.co/bitcoin), or purchase one of my books:

* [The Tao of WordPress](https://wp-tao.com/)
* [Digging into WordPress](https://digwp.com/)
* [.htaccess made easy](https://htaccessbook.com/)
* [WordPress Themes In Depth](https://wp-tao.com/wordpress-themes-book/)

And/or purchase one of my premium WordPress plugins:

* [BBQ Pro](https://plugin-planet.com/bbq-pro/) - Pro version of Block Bad Queries
* [SES Pro](https://plugin-planet.com/ses-pro/) - Super-simple &amp; flexible email signup forms
* [USP Pro](https://plugin-planet.com/usp-pro/) - Pro version of User Submitted Posts

Links, tweets and likes also appreciated. Thanks! :)



== Changelog ==

**20161118**

* New shortcodes to count words in posts!
* Added shortcode to count words in any post: `[sbs_word_count]`
* Added shortcode to count words in all posts: `[sbs_word_count_all]`
* Added new shortcodes to `sbs_blog_stats()` function
* Updated plugin author URL
* Changed stable tag from trunk to latest version
* Added `&raquo;` to rate plugin link and home link
* Updated URL for rate this plugin links
* Removed default abbr styles
* Generated new default language template
* Tested on WordPress version 4.7 (beta)

**20160813**

* Streamlined and optimized the plugin settings page
* Replaced `_e()` with `esc_html_e()` or `esc_attr_e()`
* Replaced `__()` with `esc_html__()` or `esc_attr__()`
* Added plugin icons and larger banner image
* Replaced plugin icon on settings page
* Changed text-domain from "sbs" to "simple-blog-stats"
* Removed local translations in favor of [GlotPress](https://make.wordpress.org/polyglots/handbook/tools/glotpress-translate-wordpress-org/)
* Improved translation support
* Generated new translation template
* Added ellipsis to recent comment excerpt
* Tested on WordPress 4.6

**20160408**

* Replaced icon with retina version
* Added screenshot to readme/docs
* Added retina version of banner
* Reorganized and refreshed readme.txt
* Tested on WordPress version 4.5 beta

**20151111**

* Updated heading hierarchy in plugin settings
* Updated minimum version requirement
* Tested on WordPress 4.4 beta

**20150808**

* Tested on WordPress 4.3
* Updated minimum version requirement

**20150507**

* Tested with WP 4.2 + 4.3 (alpha)
* Changed a few "http" links to "https"

**20150315**

* Tested with latest version of WP (4.1)
* Increased minimum version to WP 3.8
* Removed deprecated screen_icon()
* Streamline/fine-tune plugin code
* Added $sbs_wp_vers for version check
* Added Text Domain and Domain Path to file header
* Added .pot translation template to /languages/

**20140925**

* Tested on latest version of WP (4.0)
* Increased min-version requirement to WP 3.7
* Added conditional check for min-version function

**20140305**

* Bugfix: replaced mysql_real_escape_string() with esc_attr(), resolves PHP error

**20140123**

* Tested with latest WordPress (3.8)
* Added trailing slash to load_plugin_textdomain()

**20131106**

* Removed closing `?>` from simple-blog-stats.php
* General code cleanup and maintenance
* Tested on latest version of WordPress 3.7
* Added "rate this plugin" links
* Added uninstall.php file
* Added i18n support
* Added line to prevent direct loading of script

**20130713**

* General code check n clean
* Improved localization support
* Overview and Updates admin panels toggled open by default

**20130104**

* Added margins to submit buttons

**20121029** 

* Initial release of new plugin

**20121028**

* Fine-tuned, tested, tested, etc.

**20121027**

* Rebuilt and renamed BlogStats PCC plugin

**20060828**

* Initial release of [BlogStats PCC](https://perishablepress.com/blogstats-pcc-plugin/)


