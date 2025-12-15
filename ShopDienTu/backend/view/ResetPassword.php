<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
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
        .btn-login { width: 100%; padding: 14px; border-radius: 8px; font-weight: 700; font-size: 1rem; cursor: pointer; background-color: var(--primary-red); border: none; color: #fff; transition: 0.3s; margin-top: 10px;}
        .btn-login:hover { opacity: 0.9; }
        .alert-error { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: left; font-size: 0.9rem; }

        /* Style cho nút ẩn hiện pass */
        .password-wrapper { position: relative; }
        .password-wrapper .toggle-password { position: absolute; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer; color: #aaa; }
    </style>
</head>
<body>
<div class="login-container">
    <h1 class="main-title">Đặt mật khẩu mới</h1>

    <?php if (isset($error)): ?>
        <div class="alert-error">
            <i class="fa-solid fa-triangle-exclamation"></i> <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form action="submit_new_password" method="POST">
        <div class="form-group">
            <label>Mật khẩu mới</label>
            <div class="password-wrapper">
                <input type="password" id="pass1" name="password" placeholder="Nhập mật khẩu mới" required>
                <span class="toggle-password" onclick="togglePass('pass1', this)"><i class="fa-regular fa-eye-slash"></i></span>
            </div>
        </div>

        <div class="form-group">
            <label>Xác nhận mật khẩu</label>
            <div class="password-wrapper">
                <input type="password" id="pass2" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
                <span class="toggle-password" onclick="togglePass('pass2', this)"><i class="fa-regular fa-eye-slash"></i></span>
            </div>
        </div>

        <button type="submit" class="btn-login">Đổi mật khẩu</button>
    </form>
</div>

<script>
    // Script ẩn hiện mật khẩu
    function togglePass(inputId, iconSpan) {
        const input = document.getElementById(inputId);
        const icon = iconSpan.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    }
</script>
</body>
</html>