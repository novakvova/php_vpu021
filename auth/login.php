<?php include $_SERVER['DOCUMENT_ROOT']."/_haed.php" ?>
    <h1 class="text-center">Вхід на сайт</h1>
    <div class="row">
        <form class="offset-md-3 col-md-6">
            <div class="mb-3">
                <label for="email" class="form-label">Пошта</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Війти</button>
        </form>
    </div>
<?php include $_SERVER['DOCUMENT_ROOT']."/_footer.php"; ?>