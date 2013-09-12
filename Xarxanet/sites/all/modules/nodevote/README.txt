$Id: README.txt,v 1.8 2006/08/31 13:42:52 kbahey Exp $

Copyright 2005 http://2bits.com

Description
-----------
This module provides the ability for users to vote on various node,
assigning a score to each one. The average overall score and number
of votes are displayed below each node.

The module is useful in many situations, for example, to rate articles,
forum posts, stories.

Several blocks are provided to display top voted for nodes, top scored
nodes, and top voting users.

Permissions are used to determine which roles can vote, as well as which
roles can see the results.

Voting can be limited to one or more node type (e.g. image, page, ...etc).

Users can earn points when they vote, if the user points module is installed.

The site admin can choose whether everyone can see vote results, or whether
votes are only visible to the node owner and those who voted on that node.

Notes:

1. In order to maintain voting integrity, the author of the node is not 
   allowed to vote on nodes they created.

2. By default, anonymous users cannot vote. This will prevent vote rigging
   by logging off, and voting multiple times.
   However, it seems that some would still want that functionlity. To enable
   it, some code editing is required. Please check the workaround here
   http://drupal.org/node/32519 for detail.

Sponsored by: http://artalyst.com

You may want to use the xtracker module in conjunction with nodevote, replacing
Drupal's tracker. It allows you to display nodes sorted by score.
http://drupal.org/node/36756

Extended Version
----------------
A commercial extended version of this module allows multiple vote critera
to be used, not just one. An overall average for all criteria is calculated,
as well as for each criterion.


For example, a literature web site can rate articles on style, subject,
grammar, ...etc. A photo/art web site can rate images on composition,
exposure, topic, colors, contrast, ...etc.

Contact the author for more details.

Installation
------------
To install this module, extract the nodevote tarball that you downloaded
and copy the nodevote folder and all its contents to your modules directory.

Configuration
-------------
To enable this module do the following:

1. Go to Admin -> Modules, and enable nodevote. Make sure you get no errors.

2. Go to Admin -> Settings -> nodevote.

   Enable the node types that you want users to vote on, and enter a
   desciption for the vote (optional).

3. Go to Admin -> Access Control and enable voting/viewing for the
   roles you want. For example, you may want Authenticated users to
   view the votes, but paying customers to do the voting.

Bugs/Features/Patches:
----------------------
If you want to report bugs, feature requests, or submit a patch, please do so
at the project page on the Drupal web site.
http://drupal.org/project/nodevote

Author
------
Khalid Baheyeldin (http://baheyeldin.com/khalid and http://2bits.com)

If you use this module, find it useful, and want to send the author
a thank you note, then use the Feedback/Contact page at the URL above.

The author can also be contacted for paid customizations of this
and other modules.
