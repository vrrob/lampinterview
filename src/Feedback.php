<?php

/* 
CREATE DATABASE lampinterview;
GRANT ALL ON lampinterview.* TO 'lampinterview'@'localhost' IDENTIFIED BY 'r3FImx5qI6OcXuQxuDcVDGX';
FLUSH PRIVILEGES;
USE lampinterview;
 
CREATE TABLE `feedback` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` TEXT NOT NULL,
  `message` TEXT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB; 
*/

// Takes some values from a form and crams them into the above database table.

$db = new mysqli(
    'localhost',
    'lampinterview',
    'r3FImx5qI6OcXuQxuDcVDGX',
    'lampinterview'
);

if ($db->connect_error) {
    die('Failed to connect to database server');
}

$sql = "INSERT INTO feedback (email, message) VALUES ('{$_POST['email']}', '{$_POST['message']}')";
$db->query($sql);

if ($db->affected_rows == 1) {
    echo "Success!\n";
} else {
    echo "Failure!\n";
}

$db->close();
