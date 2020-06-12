<div class="col-md-8">
    <h1>Авторизация</h1>
    <div class="card">
        <div class="card-header">
            <div class="card-body">
                <form method="POST" action="/web.loc/auth/login" aria-label="Login">
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label text-md-right">Логин:</label>
                        <div class="col-md-6">
                            <input id="text" type="text" class="form-control" name="email" required autofocus value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Пароль:</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    
                        <?php 
                            if(!empty($_POST)) {
                                if(!$result){
                                    echo "<div class='alert alert-danger' role='alert'>";
                                    echo 'Пароль или логин введены неверно. </div>';
                                }
                            }
                        ?>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Войти
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>