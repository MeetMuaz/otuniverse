<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "otuniverse";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn) {
    die("Connect failed: " + mysqli_connect_error());
}

// CREATE TABLE users (
//     userId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
//     userName varchar(128) NOT NULL,
//     userEmail varchar(128) NOT NULL,
//     userUid varchar(128) NOT NULL,
//     userPwd varchar(128) NOT NULL
// );
//
//
// CREATE TABLE contacts (
//     contactId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
//     contactName varchar(128) NOT NULL,
//     contactEmail varchar(128) NOT NULL,
//     contactPhone varchar(10) NOT NULL,
//     contactMessage varchar(60000) NOT NULL,
// );
//
//
// CREATE TABLE admins (
//     adminId int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
//     adminName varchar(128) NOT NULL,
//     adminEmail varchar(128) NOT NULL,
//     adminUid varchar(128) NOT NULL,
//     adminPwd varchar(128) NOT NULL
// );

