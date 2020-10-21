<?php
function connectSQL() {
    // Update the details below with your MySQL details
    $Host = 'localhost:3307';
    $User = 'root';
    $Password = 'Abhi123$$$';
    $DBName = 'bookstore';
    try {
    	return new PDO('mysql:host=' . $Host . ';dbname=' . $DBName . ';charset=utf8', $User, $Password);
    } catch (PDOException $exception) {
    	die ('Failed to connect to database!');
    }
}