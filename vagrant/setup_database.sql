CREATE DATABASE wordpress_db;
CREATE USER wordpress_user@localhost IDENTIFIED BY 'wordpresspass';
GRANT ALL PRIVILEGES ON wordpress_db.* TO wordpress_user@localhost;
FLUSH PRIVILEGES;
