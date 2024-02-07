<?php
include_once("functions.php");


session_start();
if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'login') {
    $_SESSION['loggedIn'] = $_REQUEST['username'];
    session_write_close();
    exit(header('Location: admin.php'));
}
if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'logout') {
    session_unset();
    session_write_close();
    exit(header('Location: index.php'));
}


$target_dir = "uploads/";
$image = $target_dir.'movieImg.jpg';

if(!empty($_FILES['image'])) {
    if($_FILES['image']["type"] === 'image/png' || $_FILES['image']["type"] === 'image/jpg') {
        if($_FILES['image']["size"] < 4000000) {
            if(is_uploaded_file($_FILES['image']["tmp_name"]) && $_FILES['image']["error"] === UPLOAD_ERR_OK) {
                if(move_uploaded_file($_FILES['image']["tmp_name"], $target_dir.$_REQUEST['title'])) {
                    $image = $target_dir.$_REQUEST['title'];
                    echo 'image uploaded, *sound effect*...Noice!';
                } else {
                    echo 'AAAAAAAAHHHH MY IMAGE NOOOOOOO!!';
                }
            }
        } else {
            echo 'YO your image size is packing...get a __c reduction';
        }
    } else {
        echo 'All my homies hate that image type';
    }
}

if(count($_REQUEST) > 3) {
    $title = strlen(trim(htmlspecialchars($_REQUEST['title']))) > 2 ? trim(htmlspecialchars($_REQUEST['title'])) : exit;
  
    $author = strlen(trim(htmlspecialchars($_REQUEST['author']))) > 2 ? trim(htmlspecialchars($_REQUEST['author'])) : exit;
  
    $genre = in_array($_REQUEST['genre'],["Fiction","Non-Fiction","Mystery","Romance","Science-Fiction","Fantasy","Horror","Biography","History","Self-Help"]) ? trim(htmlspecialchars($_REQUEST['genre'])) : exit();
   

    $regexdmy = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/';
    preg_match_all($regexdmy, htmlspecialchars($_REQUEST['published']), $matchesdmy, PREG_SET_ORDER, 0);
    $published = $matchesdmy ? htmlspecialchars($_REQUEST['published']) : exit();
    echo ''.$published.'';
   var_dump($_REQUEST);
    isset($_REQUEST['action']) && $_REQUEST['action'] === 'addBook' ? addBook($title, $author, $published, $genre, $image):  modifyBook($_REQUEST['id'],$title, $author, $published, $genre, $image) ;
    exit(header('Location: admin.php'));
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'deleteBook') {
    deleteBook($_REQUEST['id']);
    exit(header('Location: admin.php'));

}





?>