<div class="col-md-8">
  <h1>Регистрация</h1>
  <div class="card">
    <div class="card-header"></div>
    <form method="POST" action="/web.loc/auth/regist" aria-label="Register">
      <div class="form-group row">
        <label for="fio" class="col-md-4 col-form-label text-md-right">ФИО:</label>

        <div class="col-md-6">
          <input id="fio" type="text" class="form-control" name="fio" 
            value="<?php 
            if (!(is_null($result) || $result)) {
              echo $_POST['fio'];
            } 
          ?>" 
          required autofocus>
        </div>
      </div>

      <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

        <div class="col-md-6">
          <input id="email" type="email" class="form-control" name="email" value="<?php 
            if (!(is_null($result) || $result)) {
              echo $_POST['email'];
            } 
          ?>" required autofocus>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Логин:</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="login" id="login" value="<?php 
            if (!(is_null($result) || $result)) {
              echo $_POST['login'];
            }
          ?>" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Пароль:</label>

        <div class="col-md-6">
          <input id="password" type="password" class="form-control" name="password" required>

        </div>
      </div>
      <div class="col-md-8">
        <div class='alert alert-danger' id="availability" hidden="true" role='alert'>
          <span id="aval" >Такой логин уже занят.</span>
        </div>
      </div>


      <?php
      if (!empty($_POST)) {
        if ($result) {
          echo "<div class='alert alert-success' role='alert'>";
          echo $message;
          echo "</div>";
        } else {
          echo "<div class='alert alert-danger' role='alert'>";
          echo $message;
          echo "</div>";
        }
      }
      ?>

      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
            Зарегистрироваться
          </button>
        </div>
      </div>
    </form>
    <div class="card-body">
    </div>
  </div>
</div>
<script src="\web.loc\public\assets\js\unique.js"></script>