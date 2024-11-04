<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title>Static Login</title>

    <style>
        body, html {
            height: 100%;
            background-repeat: no-repeat;
        }

        .card-container.card {
            max-width: 350px;
            padding: 40px;
            margin-top: 50px;
        }

        .btn {
            font-weight: 700;
            height: 36px;
            user-select: none;
            cursor: default;
        }

        .card {
            background-color: #F7F7F7;
            padding: 20px 25px 30px;
            margin: 0 auto 25px;
            border-radius: 2px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .profile-img-card {
            width: 96px;
            height: 96px;
            margin: 0 auto 10px;
            display: block;
            border-radius: 50%;
        }

        .profile-name-card {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
            min-height: 1em;
        }

        .reauth-email {
            display: block;
            color: #404040;
            line-height: 2;
            margin-bottom: 10px;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            box-sizing: border-box;
        }

        .form-signin #user_type,
        .form-signin #username_input,
        .form-signin #password_input {
            height: 44px;
            font-size: 16px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-signin .form-control:focus {
            border-color: rgb(104, 145, 162);
            outline: 0;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgb(104, 145, 162);
        }

        .btn.btn-signin {
            background-color: rgb(104, 145, 162);
            font-weight: 700;
            font-size: 14px;
            height: 36px;
            border: none;
            border-radius: 3px;
            transition: all 0.218s;
        }

        .btn.btn-signin:hover,
        .btn.btn-signin:active,
        .btn.btn-signin:focus {
            background-color: rgb(12, 97, 33);
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            $user_accounts = [
                'Admin' => [
                    'admin' => 'Pass1234',
                    'renmark' => 'Pogi1234'
                ],
                'Content Manager' => [
                    'pepito' => 'manaloto',
                    'juan' => 'delacruz'
                ],
                'System User' => [
                    'pedro' => 'penduko'
                ]
            ];
        ?>

        <?php if (isset($_POST['signin_button'])): ?>
            <?php
                $selected_user_type = $_POST['user_type'];
                $username = $_POST['username_input'];
                $password = $_POST['password_input'];
                
                $is_valid_user = isset($user_accounts[$selected_user_type][$username]) && $user_accounts[$selected_user_type][$username] === $password;
            ?>

            <div class="alert alert-<?php echo $is_valid_user ? 'success' : 'danger'; ?> alert-dismissible fade show" style="max-width: 350px; margin: auto;">
                <?php echo $is_valid_user ? "Welcome to the system, " . htmlspecialchars($username) . "!" : "Invalid Username or Password."; ?>
            </div>
        <?php endif; ?>

        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Profile Image"/>
            <p id="profile-name" class="profile-name-card"></p>

            <form class="form-signin" method="post">
                <select name="user_type" id="user_type" required>
                    <option value="Admin">Admin</option>
                    <option value="Content Manager">Content Manager</option>
                    <option value="System User">System User</option>
                </select>

                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="username_input" id="username_input" class="form-control" placeholder="User Name" required autofocus>
                <input type="password" name="password_input" id="password_input" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="signin_button">Sign in</button>
            </form>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>