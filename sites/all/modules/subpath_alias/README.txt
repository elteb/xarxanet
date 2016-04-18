/* $Id: README.txt,v 1.1 2009/06/20 20:48:59 smk Exp $ */

-- SUMMARY --

Drupal core's path module matches only full URLs when creating SEO-friendly
aliases for internal paths.  This module extends that behavior by also matching
known sub-paths at the beginning and replacing them with their respective alias.
For example, this allows the node edit URL (by default unaliased) node/1/edit to
become content/title/edit.  Thus, when used in conjunction with the Pathauto
module, it is possible to get rid of all remaining exposed internal URLs.

Designed with performance in mind makes this module even suitable for larger
sites (but read FAQ below first).

For a full description of the module, visit the project page:
  http://drupal.org/project/subpath_alias
To submit bug reports and feature suggestions, or to track changes:
  http://drupal.org/project/issues/subpath_alias


-- DEPENDENCIES --

* Path (Drupal core)

* URL Alter - http://drupal.org/project/url_alter

* Optional, but highly recommended:
  Pathauto - http://drupal.org/project/pathauto


-- INSTALLATION --

Install as usual, see http://drupal.org/node/70151 for further information.
There is no further configuration required.  You might want to try the
following aliases (Site building >> URL aliases >> Add alias):

* Existing system path: node/add
  Path alias:           add


-- FAQ --

Q: Why are sub-paths replaced only at the beginning of URLs?
   Couldn't this be enhanced to match sub-paths at arbitrary positions within
   the URL?

A: No, because anchoring at the beginning is the only way to properly make use
   of database indexes.  Everything else will hurt the performance too much.

Q: So this means that this implementation is fast enough for my high-traffic
   site?

A: First, be aware that this module adds a layer of complexity on top of the
   existing URL alias generation.  Having said that, I was trying hard to be as
   resource friendly as possible; the number of additional database lookups
   will increase by about 1/3 compared to path.module alone.

   However, these numbers will likely decline when #106559 [1] has been
   backported to D6.

   [1] http://drupal.org/node/106559


-- CREDITS --

Author:
Stefan M. Kudwien (smk-ka) - http://drupal.org/user/48898

This project has been sponsored by UNLEASHED MIND.
Specialized in consulting and planning of Drupal powered sites, we offer
installation, development, theming, customization, and hosting to get you
started. Visit http://www.unleashedmind.com for more information.
