WebFramework
==================
--------------------------------

###Tips###
Add the following to your .htaccess file to use the framework's 404 template for php files. <br>

	<Files ~ "\.php$">
	    ErrorDocument 404 /core/error_templates/404.php
	</Files>
Note: path is relative to DocumentRoot. Look [here](http://httpd.apache.org/docs/current/mod/core.html#errordocument) for more info.