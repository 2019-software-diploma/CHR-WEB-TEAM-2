<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */

$MySQL ["Host"] = "localhost";
$MySQL ["Username"] = "itdpcoma_chrweb2";
$MySQL ["Password"] = "Xx%jcsa#eM%x5x@z";
//$MySQL ["Password"] = "";
$MySQL ["Database"] = "itdpcoma_chrweb2";

// Initialize Database
//$MySQL ["DropDatabase"] = "DROP TABLE IF EXISTS `#Database`;";
//$MySQL ["CreateDatabase"] = "CREATE DATABASE #Database;";
//$MySQL ["CreateStaffTable"] = "CREATE TABLE `staff`( `FristName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, `LastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, `StaffNumber` char(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, `Position` tinyint(1) NULL DEFAULT NULL, `Gender` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, `DateOfBrith` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, `Department` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL, `OfficeNumber` int(11) NULL DEFAULT NULL, `BranchNumber` int(11) NULL DEFAULT NULL) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;";

//SQL scents
$MySQL ["InsertClient"] = "INSERT INTO `client` VALUES ('#ClientID', '#FirstName', '#LastName', '', '', #NewsLetter, '#Email');";
$MySQL ["InsertMember"] = "INSERT INTO `account` VALUES ('#ClientID', '#Password', NOW(), '#RegIP', NOW(), '#RegIP');";
$MySQL ["InsertPost"] = "INSERT INTO `forum` VALUES ('#ForumID', '#ClientID', '#Title', '#Comment', NOW());";
$MySQL ["InsertMaa"] = "INSERT INTO `appointments` VALUES ('#ClientID', '#StaffID', '#Date', '#Branch', '#Reason', 0);";
$MySQL ["InsertWelcomeEmail"] = "INSERT INTO `welcomeEmail` VALUES('#Name', '#ClientID', '#IP', '#Time', '#News', '#Email');";

$MySQL ["GetAccount"] = "SELECT Password FROM `account` WHERE Member_ID = '#ID';";
$MySQL ["GetClient"] = "SELECT First_Name, Last_Name, Address, Phone_Number, Subscription_Status, Email FROM `client` WHERE Client_ID = '#ID';";
$MySQL ["GetStaff"] = "SELECT First_Name, Last_Name, Position, Email FROM `staff` WHERE Staff_ID = '#ID';";
$MySQL ["GetAllStaff"] = "SELECT Staff_ID, First_Name, Last_Name FROM `staff`;";
$MySQL ["GetBranch"] = "SELECT Branch_Name, Address, Phone_number, Branch_Number FROM `branch`";
//$MySQL ["GetWelcomeEmail"] = "SELECT * FROM `welcomeEmail` WHERE ClientID = '#ClientID'";

$MySQL ["UpdateProfile"] = "UPDATE `client` SET Address = '#Address', Phone_Number = '#Phone', Subscription_Status = #Sub, Email = '#Email' WHERE Client_ID = '#ID';";