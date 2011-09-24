Bugsy: Simple Bug Tracking
==========================
Bugsy is a [CakePHP][cakephp] application for simple issue (bug) tracking. When [Bugzilla][bugzilla] or [Mantis][mantis] are too much.

Features
--------

* HTML5
* Uses [Bootstrap][bootstrap] by Twitter
* Uses [jQuery][jquery]
* Ability to allow anonymous (public) posting of issues
* Public/Private modes for entire projects
* Commenting on issues

Requirements
------------

* [PHP][php] version 5.3 or higher
* [MySQL][mysql] version 5.5 or higher
* [CakePHP][cakephp] version 1.3

Installation
------------

* Modify <code>webroot/index.php</code> to point to your CakePHP
* Modify <code>config/database.php</code> to have your DB user/password/host/dbname
* While in <code>/path/to/bugsy</code> run <code>git submodule init;git submodule update</code> to load the submodules
* While in <code>/path/to/bugsy</code> run <code>cake migration all</code> to build the DB and add the admin user (username: admin, password: password)

License
=======
Bugsy is © 2011 Jeraimee Hughes, licensed under the Creative Commons Attribution-ShareAlike 3.0 Unported License. To view a copy of this license, visit http://creativecommons.org/licenses/by-sa/3.0/ or send a letter to Creative Commons, 444 Castro Street, Suite 900, Mountain View, California, 94041, USA.

[cakephp]: http://cakephp.org/
[bugzilla]: http://www.bugzilla.org/
[mantis]: http://www.mantisbt.org/
[php]: http://php.net/
[mysql]: http://mysql.com/
[bootstrap]: http://twitter.github.com/bootstrap/
[jquery]: http://jquery.com/
