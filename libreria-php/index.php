<?php
include 'header.php';
include 'functions.php';

$books = showBooks();
?>


<div class='container p-5'>
    <div class="text-center">
        <h1 class="display-4">Welcome to Read About it</h1>
        <p class="lead">
            Explore our bookshelves, discover new books and e-books that talk about coding, and enjoy your time on our
            platform.
        </p>
        <hr class="my-4" />
        <p>
            <button class="btn btn-info" type='button'>Learn more</button>
        </p>
    </div>

    <div class="p-5 row row-cols-1 row-cols-md-3 row-cols-xl-4">
        <?php foreach ($books as $book) { ?>
            <div class="col mb-3">
                <div class="card">
                    <img src=<?= $book['image']; ?> class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $book['title']; ?>
                        </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Author:
                            <?= $book['author']; ?>
                        </li>
                        <li class="list-group-item">Genre:
                            <?= $book['genre']; ?>
                        </li>
                        <li class="list-group-item">Published Date:
                            <?= $book['published']; ?>
                        </li>
                    </ul>
                </div>
            </div>
        <?php }; ?>
    </div>

</div>


<?= include 'footer.php'; ?>