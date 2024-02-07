<?php
include 'header.php';
include 'functions.php';
session_start();
if (!(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'])) {
    session_write_close();
    header('Location: login.php');
}



$books = showBooks();
$i=0;
?>


<div class="mt-5 pt-5">
    <h1 class='text-center'>All books are shown here where you can manage them</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col-1">#</th>
                    <th scope="col-2">Image</th>
                    <th scope="col-4">Title</th>
                    <th scope="col-2">Author</th>
                    <th scope="col-1">Published</th>
                    <th scope="col-1">genre</th>
                    <th scope="col-1"><a href="aggiungi.php?action=addBook" class='btn btn-success'>Add a book</a></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">';
                <?php foreach ($books as $book) { ?>
                    <tr>
                        <th scope="row">
                            <?= $i += 1; ?>
                        </th>
                        <td>
                            <img src=<?= $book["image"]; ?> alt="movie cover" width="50" height="50">
                        </td>
                        <td>
                            <?= $book["title"]; ?>
                        </td>
                        <td>
                            <?= $book['author']; ?>
                        </td>
                        <td>
                            <?= $book['published']; ?>
                        </td>
                        <td>
                            <?= $book['genre']; ?>
                        </td>
                        <td class="fs-3">
                            <a href="modifica.php?action=modifyBook&id=<?= $book['id'] ?>"><i class="bi bi-pen me-2 btn btn-outline-light"></i></a>
                            <a href="gestione.php?action=deleteBook&id=<?= $book['id'] ?>" ><i class="bi bi-trash btn btn-outline-danger"></i></a>
                        </td>';
                    </tr>
                <?php };?>
            </tbody>
        </table>
    </div>';

<?= include 'footer.php';?>