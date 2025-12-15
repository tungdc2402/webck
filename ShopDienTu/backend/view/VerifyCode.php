<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập mã xác nhận</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <style>
        /* Dùng chung style như trên */
        :root { --primary-red: #d70018; --bg-light-gray: #f8f9fa; --text-dark: #333; }
        body { font-family: 'Roboto', sans-serif; background-color: var(--bg-light-gray); display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .login-container { background-color: #fff; max-width: 450px; width: 100%; padding: 40px; border-radius: 16px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05); text-align: center; }
        .main-title { color: var(--primary-red); font-size: 1.8rem; font-weight: 700; margin-bottom: 10px; }
        .sub-title { color: #666; font-size: 0.9rem; margin-bottom: 25px; }
        .form-group { margin-bottom: 20px; text-align: left; }
        .form-group label { display: block; font-size: 0.9rem; color: var(--text-dark); margin-bottom: 8px; font-weight: 500; }

        /* Style riêng cho ô nhập mã OTP */
        .otp-input {
            width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 1.5rem;
            box-sizing: border-box; text-align: center; letter-spacing: 10px; font-weight: bold; color: var(--primary-red);
        }
        .otp-input:focus { outline: none; border-color: var(--primary-red); box-shadow: 0 0 0 2px rgba(215, 0, 24, 0.1); }

        .btn-login { width: 100%; padding: 14px; border-radius: 8px; font-weight: 700; font-size: 1rem; cursor: pointer; background-color: var(--primary-red); border: none; color: #fff; transition: 0.3s; }
        .btn-login:hover { opacity: 0.9; }
        .alert-error { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: left; font-size: 0.9rem; }
    </style>
</head>
<body>
<div class="login-container">
    <h1 class="main-title">Nhập mã xác nhận</h1>
    <p class="sub-title">Mã xác nhận 6 số đã được gửi đến: <br><b><?php echo $_SESSION['reset_email'] ?? ''; ?></b></p>

    <?php if (isset($error)): ?>
        <div class="alert-error">
            <i class="fa-solid fa-triangle-exclamation"></i> <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form action="submit_verify_code" method="POST">
        <div class="form-group">
            <input type="text" class="otp-input" name="otp_code" maxlength="6" placeholder="______" required autocomplete="off">
        </div>
        <button type="submit" class="btn-login">Xác thực</button>
    </form>

    <div style="margin-top: 20px;">
        <a href="forgot_password" style="color: #007bff; text-decoration: none; font-size: 0.9rem;">Gửi lại mã?</a>
    </div>
</div>
</body>
</html>