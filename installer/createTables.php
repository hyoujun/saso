<?php
use \saso\classes\base;

if(null != $post->getRequest()){
    $pdo = base\PdoManager::getPdo();
    
    $sql[] = "CREATE TABLE Item (
          dateCode CHAR(4) NOT NULL
        , serial INT(4) ZEROFILL NOT NULL
        , itemName VARCHAR(50) NOT NULL
        , pla INT(1) NOT NULL DEFAULT 0
        , plaNote VARCHAR(50)
        , paper INT(1) NOT NULL DEFAULT 0
        , paperNote VARCHAR(50)
        , createAt DATETIME NOT NULL
        , concatId CHAR(8) NOT NULL
        , price INT
        , categoryId CHAR(8)
        , updateAt DATETIME
        , archive INT(1) NOT NULL DEFAULT 0
        , archiveNote VARCHAR(50)
        , archiveAt DATETIME
       
        , PRIMARY KEY(dateCode, serial)
    )";
    $sql[] = "CREATE TABLE Category (
          categoryId INT NOT NULL
        , categoryName VARCHAR(50) NOT NULL
        , categoryLeft INT NOT NULL
        , categoryRight INT NOT NULL
        , CHECK (categoryLeft < categoryRight)
        
        , PRIMARY KEY(categoryId)
    )";
    $sql[] = "CREATE TABLE Color (
          concatId CHAR(8) NOT NULL
        , colorCode  CHAR(2) NOT NULL
        , colorName VARCHAR(50) NOT NULL
        , image MEDIUMBLOB
        , imageType VARCHAR(100)
        
        , PRIMARY KEY(concatId, colorCode)
    )";
    $sql[] = "CREATE TABLE Size (
          concatId CHAR(8) NOT NULL
        , sizeCode CHAR(2) NOT NULL
        , sizeName VARCHAR(50) NOT NULL
        , orderNumber INT(2)
        
        , PRIMARY KEY(concatId, sizeCode)
    )";
    $sql[] = "CREATE TABLE Detale (
          detaleCode CHAR(12) NOT NULL PRIMARY KEY
        , concatId CHAR(8) NOT NULL
        , colorCode CHAR(2) NOT NULL
        , sizeCode CHAR(2) NOT NULL
    )";
    $sql[] = "CREATE TABLE Shelf (
          detaleCode CHAR(12) NOT NULL PRIMARY KEY
        , shelfNumber VARCHAR(15)
    )";
    $sql[] = "CREATE TABLE QuantityLog (
          detaleCode CHAR(12) NOT NULL
        , fluctuation INT(4) NOT NULL
        , inventoryFlag INT(1) DEFAULT 0
        , changeAt DATETIME
    )";
    $sql[] = "CREATE TABLE Label (
          labelName VARCHAR(50) NOT NULL PRIMARY KEY
        , marginTop DOUBLE(5,1) NOT NULL
        , marginLeft DOUBLE(5,1) NOT NULL
        , width DOUBLE(5,1) NOT NULL
        , height DOUBLE(5,1) NOT NULL
        , intervalColomn DOUBLE(5,1) NOT NULL
        , intervalRow DOUBLE(5,1) NOT NULL
    )";
    $sql[] = "CREATE TABLE LabelCache (
          detaleCode CHAR(12) NOT NULL PRIMARY KEY
        , sheetsAmount INT(4) NOT NULL
    )";
    $sql[] = "CREATE TABLE Member (
          id CHAR(20) NOT NULL PRIMARY KEY
        , password VARCHAR(80) NOT NULL
        , userName VARCHAR(50) NOT NULL
    )";
    foreach($sql as $value){
        try{
            $pdo->query($value);
        }catch(\PDOException $e){
            die('データベース作成時にエラーが発生しました。最初から全てやり直して下さい。');
        }

    }
    $password = base\Password::makeHash($password);
    $userName = $post->getRequest('name');
    $stmt = $pdo->prepare('
         INSERT INTO Member (
               id
             , password
             , userName
         ) VALUES (
               :id
             , :password
             , :userName
         )
    ');
    $stmt->bindValue(':id', $id, \PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, \PDO::PARAM_STR);
    $stmt->bindValue(':userName', $userName, \PDO::PARAM_STR);
    try{
        $stmt->execute();
    }catch(\PDOException $e){
        die('データベース作成時にエラーが発生しました。最初から全てやり直して下さい。');
    }
}

