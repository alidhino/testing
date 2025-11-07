<?php
session_start();

// Data login sederhana
$users = [
    'admin' => '12345',
    'kasir' => '0000'
];

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

// Proses login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta charset="UTF-8">
    <title>POLGAN MART</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #007bff, #00c6ff);
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-box {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
            width: 320px;
            text-align: center;
            animation: fadeIn 0.8s ease;
        }

        h3 {
            color: #007bff;
            margin-bottom: 20px;
            font-weight: 700;
        }

        input {
            width: 90%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #007bff;
            box-shadow: 0 0 4px #007bff;
        }

        button {
            border: none;
            padding: 10px;
            width: 45%;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .login-btn {
            background: #007bff;
            color: white;
        }

        .login-btn:hover {
            background: #0056b3;
        }

        .cancel-btn {
            background: #dc3545;
            color: white;
        }

        .cancel-btn:hover {
            background: #b52a36;
        }

        .footer {
            margin-top: 15px;
            font-size: 13px;
            color: #555;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h3>POLGAN MART</h3>
        <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <div style="position: relative; display: inline-block; width: 100%;">
                <input type="password" id="password" name="password" placeholder="Password" required style="width: 85%; padding-right: 30px;">
                <span onclick="togglePassword()" style="
        position: absolute;
        right: 20px;
        top: 9px;
        cursor: pointer;
        user-select: none;
        font-size: 25px;
        color: gray;"><i class="fa fa-eye" id="eyeIcon" onclick="togglePassword()"></i>
                </span>
            </div>

            <div style="display:flex; justify-content:space-between;">
                <button type="submit" name="login" class="login-btn">Login</button>
                <button type="reset" class="cancel-btn">Cancel</button>
            </div>
        </form>
        <div class="footer">© 2025 POLGAN MART</div>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }
    </script>

</body>

</html>
