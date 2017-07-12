=== Plugin Name ===
Contributors: sergey.s.betke@novgaro.ru
Donate link: http://sergey-s-betke.blogs.novgaro.ru/category/web/wordpress/read-more/
Tags: ajax, jQuery
Requires at least: 3.0.0
Tested up to: 3.3
Stable tag: trunk

Automatically transform your <strong>&lt;!--more--&gt;</strong> links into links that immediately display the rest of your entry (AJAX).

== Description ==

AJAX-read-more uses the jQuery framework already included with Wordpress installations. This
plugin used **GET** ajax action (not POST, like "Read More Right Here"), wordpress **"wp"** action. It's
compatible with cache plugins (like Hyper Cache). 
When your blog is loaded, all links of this custom class are modified to no longer send the user to that post's 
single page display when clicked. Instead, the Wordpress database is queried for that specific post, and all content
after the **&lt;!--more--&gt;** tag (i.e. only what you need) is returned. 
The new content is then immediately displayed to the user, inline with the opening content.

Check plugin options on options page.

Thanks for debugging to den@10-13.ru.

**Theme requirements:**

* Your **theme must generate correct DOM structure**:
(div id="#content")
	...
	(div class="post")
		...
	(/div) 
(/div)
* Theme must support **footer** (wp_footer). If not, you can change corresponding option on plugin option page.

For more information, please visit the [Sergey S. Betke blog](http://sergey-s-betke.blogs.novgaro.ru/category/web/wordpress/read-more).

== Lightweight and Unobtrusive ==

I consider this a "lightweight", unobtrusive plugin for two reasons:

1. Your WP blog is not modified in any way. All existing and future entries will look exactly the same. You can choose to modify the "more" text passed to the_content to reflect the new behavior (e.g. "View the rest of this entry right here") if you choose, but that is entirely up to you.
1. AJAX-read-more: design of progress indicator - by CSS (example - in screen.css)

== Upgrade Notice ==

= 2.0.5 =
* non critical, css url versioning for cache updating

= 2.0.4 =
* non critical, fixed cache HTTP headers for AJAX responses

= 2.0.3 =
* non critical, animation cosmetic improvements 

= 2.0.2 =
* non critical, fixed browser reflow process after plugin animation

= 2.0.1 =
* non critical, fixed cached responces for old version 

= 2.0.0 =
* non critical, just themes compatibility
* themes compatibility: removed .more-link-container

= 1.10.0 =
* non critical, just usability
* animation option: scrollable container selection - parentScrollableEl (default - "html,body")

= 1.9.6 =
* critical, fixed AJAX response parsing IE8 compatibility 

= 1.9.5 =
* critical, fixed AJAX response parsing errors

= 1.9.4 =
* non critical, fixed AJAX response parsing 

= 1.9.3 =
* non critical, cosmetic - i use get_the_content stripteaser=true 

= 1.9.2 =
* non critical - search pages support

= 1.9.1 =
* non critical (for non Windows OS) - fixed error on AJAX response (changed '\' to '/' in file paths, sorry)

= 1.9.0 =
* animation option: scroll to post header or to post content after excerpt - scrollToSelector (default - .entry-header)

= 1.8.0 =
* non critical, just usability
* animation option: loadingClass (default - .loading)
* animation option: errorClass (default - .loading-error)
* animation option: animateSpeed (default - 'slow')

= 1.7.0 =
* non critical, just usability

= 1.6.0 =
* non critical, just usability

= 1.5.1 =
* critical for jQuery safe mode

= 1.5.0 =
* non critical, just usability

= 1.4.2 =
* critical for non Windows OS - fixed error on options page (changed '\' to '/' in file paths, sorry)

= 1.4.1 =
* it's non-critical updates - downgrade to PHP 5.2, options page

= 1.4.0 =
* it's beta version - just for debug

= 1.3.0 =
* it's non-critical updates - lambda functions used

= 1.2.3 =
* it's critical for non XML AJAX responses

= 1.2.2 =
* it's critical for 'hit.counter' event subscribers

= 1.2.1 =
* recommended: counters special event 'hit.counter' generated

= 1.2.0 =
* it's beta version with xhtml formatted AJAX response.

= 1.1.4 =
Just for themes without (div id="content")
* when (div id="content") is missing, (body) element used.

= 1.1.3 =
Recommended for linux/unix hosted services.
* all file names - in lower case.
* when wordpress theme does not produce (div class="post") wrapper,
window scrolled to .entry-part element (post excerpt in our case)

= 1.1.2 =
Recommended.
* AJAX responces sanitized (just force_balance_tags()).

= 1.1.1 =
Is't critical.
* Added requirements of this plugin for themes.

= 1.1.0 =
Is't critical.
* Now jquery.ajax.readmore is ready for AJAX'ed paged arhives.
* Changed DOM structure for excerpt and seque.
* Changed some animation.

= 1.0.0 =
This version is first release of this plugin.

== Changelog ==

= 2.0.5 =
* css url versioning for cache updating

= 2.0.4 =
* fixed cache HTTP headers for AJAX responses

= 2.0.3 =
* animation cosmetic improvements 

= 2.0.2 =
* fixed browser reflow process after plugin animation

= 2.0.1 =
* fixed cached responces for old version 

= 2.0.0 =
* themes compatibility: removed .more-link-container

= 1.10.0 =
* animation option: scrollable container selection - parentScrollableEl (default - "html,body")

= 1.9.6 =
* critical, fixed AJAX response parsing IE8 compatibility 

= 1.9.5 =
* critical, fixed AJAX response parsing errors

= 1.9.4 =
* non critical, fixed AJAX response parsing 

= 1.9.3 =
* cosmetic: i use get_the_content stripteaser=true 

= 1.9.2 =
* search pages support

= 1.9.1 =
* fixed error (for non Windows OS) - fixed error on AJAX response (changed '\' to '/' in file paths, sorry)

= 1.9.0 =
* animation option: scroll to post header or to post content after excerpt - scrollToSelector (default - .entry-header)

= 1.8.0 =
* animation option: loadingClass (default - .loading)
* animation option: errorClass (default - .loading-error)
* animation option: animateSpeed (default - 'slow')

= 1.7.0 =
* option: custom error message

= 1.6.0 =
* animation option: full block scrolling

= 1.5.1 =
* jQuery safe mode support

= 1.5.0 =
* animation option: block scrolling when scroll less to XXX pixels

= 1.4.2 =
* fixed - error on options page (changed '\' to '/' in file paths, sorry)

= 1.4.1 =
* downgrade to PHP 5.2
* options page

= 1.3.1 =
* without lambda functions (for PHP 5.2- compatibility).

= 1.3.0 =
* lambda functions used

= 1.2.3 =
* workaround for non XML AJAX response

= 1.2.2 =
* correct detection of title of ajax loaded content
* ajax response parsing by $.parseXML

= 1.2.1 =
* special counter event triggered when ajax query succeded:
trigger('hit.counter', {url: dt.url, title: dt.title, referer: dt.referer, params: {} })

= 1.2.0 =
* it's beta version with xhtml formatted AJAX response. It's first step for counters hit method support.

= 1.1.4 =
* when (div id="content") is missing, (body) element used.

= 1.1.3 =
* all file names - in lower case (for linux hosted sites).
* when wordpress theme does not produce (div class="post") wrapper,
window scrolled to .entry-part element (post excerpt in our case)

= 1.1.2 =
* AJAX responces sanitized (just force_balance_tags()).
* Stripped empty (p)(/p) tags.

= 1.1.1 =
* Some adaptions for standard wordpress themes.

= 1.1.0 =
* Now jquery.ajax.readmore is ready for AJAX'ed paged arhives.
* Changed DOM structure for excerpt and seque.
* Changed some animation.

= 1.0.0 =
* Initial Release + onupdate custom jQuery event.

== Installation ==

Simple:

1. Upload the `AJAX-read-more` directory ("unzipped") to the `/wp-content/plugins/` directory
1. Find "AJAX Read More" in the 'Plugins' menu in WordPress and click "Activate"

* **PHP 5.2**
* Your **theme must generate correct DOM structure**:
(div id="#content")
	...
	(div class="post")
		...
	(/div)
(/div)
* Theme must support **footer** (wp_footer). If not, you can change plugin options on options page.

**That's It!**

== Frequently Asked Questions ==

= Requirements? =

Just read "installation" section.

= How do I change the "loading" image? =

Change CSS rules for class "loading". Example - screen.css.
The "loading" image used to visually inform the user that the new content is arriving was created using the excellent [Ajax Load](http://www.ajaxload.info/) website.
To use a different image you can create a new one, name it "ajax-loader.gif".

== Screenshots ==

1. Site page with ajax loading indicator.

== ToDo ==
The next version or later:

= 3.0.0 =
* non critical
* first version with **the_excerpt** support

