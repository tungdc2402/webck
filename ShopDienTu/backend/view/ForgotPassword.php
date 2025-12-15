<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <style>
        :root { --primary-red: #d70018; --bg-light-gray: #f8f9fa; --text-dark: #333; }
        body { font-family: 'Roboto', sans-serif; background-color: var(--bg-light-gray); display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .login-container { background-color: #fff; max-width: 450px; width: 100%; padding: 40px; border-radius: 16px; box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05); text-align: center; }
        .main-title { color: var(--primary-red); font-size: 1.8rem; font-weight: 700; margin-bottom: 25px; }
        .form-group { margin-bottom: 20px; text-align: left; }
        .form-group label { display: block; font-size: 0.9rem; color: var(--text-dark); margin-bottom: 8px; font-weight: 500; }
        .form-group input { width: 100%; padding: 12px; border: 1px solid #e0e0e0; border-radius: 8px; font-size: 1rem; box-sizing: border-box; }
        .form-group input:focus { outline: none; border-color: var(--primary-red); }
        .btn-login { width: 100%; padding: 14px; border-radius: 8px; font-weight: 700; font-size: 1rem; cursor: pointer; background-color: var(--primary-red); border: none; color: #fff; transition: 0.3s; }
        .btn-login:hover { opacity: 0.9; }
        .back-link { display: block; margin-top: 15px; color: #666; text-decoration: none; font-size: 0.9rem; }
        .back-link:hover { color: var(--primary-red); }
        .alert-error { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: left; font-size: 0.9rem; }
    </style>
</head>
<body>
<div class="login-container">
    <h1 class="main-title">Quên mật khẩu</h1>

    <?php if (isset($error)): ?>
        <div class="alert-error">
            <i class="fa-solid fa-triangle-exclamation"></i> <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form action="send_reset_code" method="POST">
        <div class="form-group">
            <label for="email">Nhập Email đăng ký</label>
            <input type="email" id="email" name="email" placeholder="Ví dụ: abc@gmail.com" required>
        </div>
        <button type="submit" class="btn-login">Gửi mã xác nhận</button>
    </form>

    <a href="login" class="back-link"><i class="fa-solid fa-arrow-left"></i> Quay lại đăng nhập</a>
</div>
</body>
</html>