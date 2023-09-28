<?php require 'header.php'; ?>
<!-- book section -->

    <h2>
        New
    </h2>
    <h6>会員登録</h6>

      <form action="login.php" method="post">
        <input type="hidden" name="command" value="regist">
        <input type="text" class="form-control" placeholder="Login Name" name="name" required/>
        <input type="password" class="form-control" placeholder="Password" name="password" required/>
        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required/>
        
        <div class="btn_box">
            <button>
              <input type="submit" value="会員登録">
            </button>
        </div>
      </form>

<?php require 'footer.php'; ?>