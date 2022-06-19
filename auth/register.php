<?php
$error="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $lastname=$_POST["lastname"];
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $photo=$_FILES["photo"]["tmp_name"];
    $password=$_POST["password"];
    $confirmPassword=$_POST["confirmPassword"];

    $uploads_dir = '/uploads';
    $filename = uniqid().'.jpg';
    $filesavepath=$_SERVER['DOCUMENT_ROOT']."/$uploads_dir/$filename";

    move_uploaded_file($photo, $filesavepath);

    if($email=="admin@gmail.com" && $password=="123456")
    {
        header("location: /");
        exit();
    }
    else{
        $error="Невірні дані";
    }

}

?>

<?php include $_SERVER['DOCUMENT_ROOT']."/_haed.php" ?>

    <div class="row">
        <div class=" offset-md-3 col-md-6 ">
            <h1 class="text-center">Створити новий акаунт</h1>
            <form class="needs-validation" method="post" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="lastname" class="form-label">Прізвище</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" required>
                    <div class="invalid-feedback">
                        Вкажіть Прізвище
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Ім'я</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                    <div class="invalid-feedback">
                        Вкажіть Ім'я
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="text" class="form-control" name="phone" id="phone" required>
                    <div class="invalid-feedback">
                        Вкажіть телефон
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Електронна пошта</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                    <div class="invalid-feedback">
                        Вкажіть пошту
                    </div>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">Оберіть фото</label>
                    <input class="form-control form-control-sm" id="file" type="file" name="photo" accept="image/*" >
                    <span id="output"> </span>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Повтор пароля</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                </div>
                <button type="submit" class=" btn btn-primary">Реєстрація</button>
            </form>
        </div>
    </div>

    <script src="/js/imask.js"></script>

    <script type="text/JavaScript">
        function handleFileSelect(evt) {
            let file = evt.target.files; // FileList object
            let f = file[0];
            if(f)
            {
                // Only process image files.
                if (!f.type.match('image.*')) {
                    alert("Image only please....");
                    return;
                }
                const url = URL.createObjectURL(f);
                let span = document.createElement('span');
                span.innerHTML = ['<img class="thumb" height="150" witht="150" title="', escape(f.name), '" src="', url, '" />'].join('');
                document.getElementById('output').insertBefore(span, null);
            }
        }
        document.getElementById('file').addEventListener('change', handleFileSelect, false);
    </script>

    <script>
        var phoneMask = IMask(
            document.getElementById('phone'), {
                mask: '+{38}(000)000-00-00'
            });
    </script>

<?php include $_SERVER['DOCUMENT_ROOT']."/_footer.php"; ?>