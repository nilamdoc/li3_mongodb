li3_mongodb
===========

Check all queries working in MongoDB from Lithium based on 

http://docs.mongodb.org/manual/reference/sql-comparison/

http://docs.mongodb.org/manual/reference/sql-aggregation-comparison/

Installation
====
The installation process is simple:

    $ git clone git@github.com:nilamdoc/li3_mongodb.git

Changes:
====
Modify `/app/config/bootstrap/libraries.php`

    define('LITHIUM_LIBRARY_PATH', dirname(LITHIUM_APP_PATH) . '/libraries');
	
Usage:

http://localhost/li3_mongodb will show you the default lithium page.

http://localhost/li3_mongodb/queries will show the queries from http://docs.mongodb.org/manual/reference/sql-comparison/

http://localhost/li3_mongodb/aggregations will show the queries from http://docs.mongodb.org/manual/reference/sql-aggregation-comparison/

Requirements:
====

PHP 5.3+

MongoDB 2.2.1+

PHP extension 	mongo/1.3.0RC1   `https://github.com/mongodb/mongo-php-driver/downloads`

Database:

    li3_mongo 

with Collections

    users
	orders

Additional Libraries
====

You can also use `https://github.com/nilamdoc/li3_show` as a library to include in your project. This will show runtime execution of the query result in a table rather than a `vardump` or `print_r($query)`.

Import DB
====
You can import mongo-li3_mongo.js to the li3_mongo database.