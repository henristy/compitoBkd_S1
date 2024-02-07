<?= include 'header.php';?>

<div class="mt-5 pt-2 container">
    <h1 class="mb-5 text-center py-5">Login for admin privileges</h1>
    <div class="container w-25 mx-auto mb-5">
        <form class="row g-3" action="gestione.php?action=login" method="POST">
            <div class="col-12">
                <label for="validationCustom01" class="form-label">Username</label>
                <input type="text" class="form-control" id="validationCustom01" value="" name="username" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-12">
                <label for="validationCustom02" class="form-label">Password</label>
                <input type="password" class="form-control" id="validationCustom02" value="" name="password" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Log In</button>
            </div>
        </form>
    </div>
</div>

    <?= include 'footer.php'; ?>