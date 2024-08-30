<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #B51828;
            padding: 20px;
            color: white;
        }

        .sidebar h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
            color: white;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 20px;
            font-size: 18px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
        }

        .main-content h3 {
            color: #B51828;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .card p strong {
            color: #B51828;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Quản Lý</h2>
            <ul>
                <li><a href="#"><i class="fas fa-stream"></i> Feed</a></li>
                <li><a href="clarins"><i class="fas fa-building"></i> Trang</a></li>
                <li><a href="/clarins"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a></li>

            </ul>
        </div>
        <div class="main-content">
            <h3>Thông Tin Quản Lý</h3>
            <div class="card">
                <p><strong>Full Name:</strong> Nguyễn Văn B</p>
                <p><strong>Email:</strong> nguyenvanb@example.com</p>
                <p><strong>Join Date:</strong> 01/01/2020</p>
            </div>
            <p><strong>Change Password</strong> </p>
        <form action="process.php" method="post">
            <label for="newPassword">Email:</label>
            <input type="password" id="newPassword" name="newPassword" required>

            <label for="oldPassword">Mật khẩu cũ:</label>
            <input type="password" id="oldPassword" name="oldPassword" required>

            <label for="newPassword">Mật khẩu mới:</label>
            <input type="password" id="newPassword" name="newPassword" required>

            <label for="confirmPassword">Xác nhận mật khẩu mới:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
            <i class="fa fa-eye" id="togglePassword"></i>

            <br>
            <button type="submit">Đổi mật khẩu</button>
        </form>

        </div>
    </div>

</body>
</html>
<style>



label {
    display: block;
    margin-bottom: 5px;
}

input[type="password"] {
    width: 500px;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[type="submit"] {
    background-color: #b51828;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}
</style>
