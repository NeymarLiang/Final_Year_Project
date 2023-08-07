<?php
        $dbHost = 'localhost';
        $dbUser = 'root';
        $dbPass = 'yapyiliang123';
        $dbname = "fyp";
        $mysqli = new mysqli($dbHost,$dbUser,$dbPass,$dbname);
        // if ($mysqli->query("CREATE DATABASE fyp")) {
        //      print("database art created");
        //  }

        //     $sql = "CREATE TABLE account(
        //          customerID INT NOT NULL AUTO_INCREMENT,
        //          UserName VARCHAR(255) NOT NULL,
        //          Password VARCHAR(255) NOT NULL,
        //          FirstName VARCHAR(255) NOT NULL,
        //          Address VARCHAR(255) NOT NULL,
        //          City VARCHAR(255) NOT NULL,
        //          PostalCode VARCHAR(255) NOT NULL,
        //          phNO VARCHAR(255) NOT NULL,
        //          Email VARCHAR(255) NOT NULL,
        //          PRIMARY KEY (customerID)
        //          )";

        //  if ($mysqli->query($sql)) {
        //      printf("Table artDetails created successfully.<br />");
        //     }

        //     if($mysqli->errno){
        //      printf("Could not create table: %s<br/>",$mysqli->error);
        //     }

        // $sql = "CREATE TABLE item(
        //           itemID INT NOT NULL AUTO_INCREMENT,
        //           itemName VARCHAR(255) NOT NULL,
        //           itemPrice FLOAT,
        //           itemQuantity INT NOT NULL,
        //           itemPic VARCHAR(255) NOT NULL,
        //           itemSize VARCHAR(255) NOT NULL,
        //           PRIMARY KEY (itemID)
        //           )";

        // if ($mysqli->query($sql)) {
        //     printf("Table item created successfully.<br />");
        // }

        // if($mysqli->errno){
        //     printf("Could not create table: %s<br/>",$mysqli->error);
        // }

        // $sql = "CREATE TABLE item2(
        //           itemID INT NOT NULL AUTO_INCREMENT,
        //           itemName VARCHAR(255) NOT NULL,
        //           itemPrice FLOAT,
        //           itemQuantity INT NOT NULL,
        //           itemPic VARCHAR(255) NOT NULL,
        //           itemSize VARCHAR(255) NOT NULL,
        //           PRIMARY KEY (itemID)
        //           )";

        // if ($mysqli->query($sql)) {
        //     printf("Table item created successfully.<br />");
        // }

        // if($mysqli->errno){
        //     printf("Could not create table: %s<br/>",$mysqli->error);
        // }

    //      $sql = "CREATE TABLE cart (
    //     cartID int not null AUTO_INCREMENT,
    //     customerID int,
    //     itemID INT,
    //     itemName VARCHAR(255),
    //     itemPrice FLOAT,
    //     itemPic VARCHAR(255),
    //     itemSize VARCHAR(255),
    //     itemQuantity int,
    //     totalPrice FLOAT,
    //     PRIMARY KEY (cartID)
    // )";


    //     if ($mysqli->query($sql)) {
    //         printf("Table cart created successfully.<br />");
    //     }

    //     if($mysqli->errno){
    //         printf("Could not create table: %s<br/>",$mysqli->error);
    //     }

        // $sql = "CREATE TABLE salesRecord(
        //     salesID INT NOT NULL AUTO_INCREMENT,
        //     customerID INT NOT NULL,
        //     itemName VARCHAR(255) NOT NULL,
        //     name VARCHAR(255) NOT NULL,
        //     itemSuze VARCHAR(255) NOT NULL,
        //     itemQuantity INT NOT NULL,
        //     totalPrice FLOAT NOT NULL,
        //     Address VARCHAR(255) NOT NULL,
        //     City VARCHAR(255) NOT NULL,
        //     PostalCode VARCHAR(255) NOT NULL,
        //     phNO VARCHAR(255) NOT NULL,
        //     Email VARCHAR(255) NOT NULL,
        //     date_added DATE NOT NULL,
        //     PRIMARY KEY (salesID)
        //     )";

        // if ($mysqli->query($sql)) {
        //     printf("Table artDetails created successfully.<br />");
        //     }

        // if($mysqli->errno){
        //     printf("Could not create table: %s<br/>",$mysqli->error);
        //     }

       // $sql = "CREATE TABLE feedback(
       //    feedbackID INT AUTO_INCREMENT PRIMARY KEY,
       //    feedbackMessage VARCHAR(255) NOT NULL,
       //    feedbackDate DATETIME DEFAULT CURRENT_TIMESTAMP
       //  )";

       //  if ($mysqli->query($sql)) {
       //    printf("Table feedback created successfully.<br />");
       //  }

       //  if($mysqli->errno){
       //    printf("Could not create table: %s<br/>",$mysqli->error);
       //  }

?>