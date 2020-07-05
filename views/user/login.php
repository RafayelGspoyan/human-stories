<?php //require_once ROOT . "/views/admin_header.php"?>
<link href="<?php ROOT ?>/template/css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?php ROOT ?>/template/css/custom.css" rel="stylesheet" />
<link href="<?php ROOT ?>/template/css/style.css" rel="stylesheet" />
<div class="container">
<div class="center-block login">
<form class="form-group" action="" method="post">
    <div>
        <?php
        if (isset($_SESSION['errors']['userNotFound']) && $_SESSION['errors']['userNotFound'] !== true)
            echo $_SESSION['errors']['userNotFound'];
        ?>
    </div>
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input name="email" type="text" id="inputEmail" class="form-control" placeholder="Email address">
    <span class="email">
        <?php
        if (isset($_SESSION['errors']['emailError']) && $_SESSION['errors']['emailError'] !== true)
            echo $_SESSION['errors']['emailError'];
        ?>
    </span>
    <label for="inputPassword" class="sr-only">Password</label>
    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password">
    <span class="password">
        <?php
        if (isset($_SESSION['errors']['passwordError']) && $_SESSION['errors']['passwordError'] !== true)
            echo $_SESSION['errors']['passwordError'];
        ?>
    </span>
    <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit">
</form>
</div>
</div>
<?php //require_once ROOT . "/views/admin_footer.php"?>
