<?php
require_once 'database/config.php';

$mysqli = new mysqli(
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_password']
);

if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}


global $mysqli;
$sql = 'CREATE DATABASE IF NOT EXISTS library_management';
if (!$mysqli->query($sql)) {
    die($mysqli->error);
}

$sql = 'USE library_management';
if (!$mysqli->query($sql)) {

    die($mysqli->error);
}

$sql = 'CREATE TABLE IF NOT EXISTS books  (
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
                title VARCHAR(255) NOT NULL,
                author VARCHAR(255) NOT NULL,
                published DATE NOT NULL,
                genre VARCHAR(255) NOT NULL,
                image VARCHAR(100) NULL
            )';
if (!$mysqli->query($sql)) {
    die($mysqli->error);
}
;
function showBooks()
{
    global $mysqli;
    $booksData = [];
    $sql = "SELECT * FROM books";
    $res = $mysqli->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            array_unshift($booksData, $row);
        }
    }
    return $booksData;
}

function showBookbyId( $id)
{
    global $mysqli;
    $sql = "SELECT * FROM books WHERE id =" . $id;
    $res = $mysqli->query($sql);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $booksData[] = $row;
        }
    }
    return $booksData;
}

function addBook( $title, $author, $published, $genre, $image)
{
    global $mysqli;
    $sql = "INSERT INTO books ( title, author, published, genre, image ) 
                VALUES ('".$title."', '".$author."', '".$published."', '".$genre."', '".$image."');";
    if (!$mysqli->query($sql)) {
        echo ($mysqli->error);
    } else {
        echo 'Added a new book woohooo!';
    }
}



function modifyBook($id,  $title, $author, $published, $genre, $image)
{
    global $mysqli;
    $sql = "UPDATE books SET 
                        title = '" . $title . "', 
                        author = '" . $author . "', 
                        published = '" . $published . "', 
                        genre = '" . $genre . "', 
                        image = '" . $image . "'
            WHERE id = " . $id;
    if (!$mysqli->query($sql)) {
        echo ($mysqli->error);
    } else {
        echo 'New mods registered son!!!';
    }
}

function deleteBook($id)
{
    global $mysqli;
    if (!$mysqli->query('DELETE FROM books WHERE id = ' . $id)) {
        echo ($mysqli->error);
    } else {
        echo 'Book obliterated!!!';
    }
}

