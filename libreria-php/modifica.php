<?php

include 'header.php';
include 'functions.php';


$book = showBookbyId($_REQUEST["id"])[0];
?>

<div class="container">

    <h1 class="mb-5 text-center py-5">Book details</h1>
    <div class="w-50 mx-auto">
        <form class="row g-3" validate action="gestione.php?action=modifyBook&id=<?= $_REQUEST['id'] ?>" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" value="<?= $book['title'] ?>" name="title" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?= $book['author'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="published" class="form-label">Published</label>
                <input class="form-control" id="published" name="published" type="date" placeholder="dd-mm-yyyy"
                    value="<?= $book['published'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Pick a genre:</label>
                <select class="form-select" aria-label="Select a genre" id="genre" 
                    name='genre'>
                    <option selected value="<?= $book['genre'] ?>"><?= $book['genre'] ?></option>
                    <option value="Fiction">Fiction</option>
                    <option value="Non-Fiction">Non-Fiction</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Romance">Romance</option>
                    <option value="Science-Fiction">Science Fiction</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Horror">Horror</option>
                    <option value="Biography">Biography</option>
                    <option value="Bistory">History</option>
                    <option value="Self-Help">Self-Help</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Add a book cover</label>
                <input class="form-control" type="file" id="formFile" value="<?= $book['image'] ?>">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </form>
    </div>
</div>
<?= include 'footer.php' ?>