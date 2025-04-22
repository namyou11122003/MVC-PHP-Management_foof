<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Login Form</title>
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'mangement_food');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['gmail']) && isset($_POST['password'])) {
        $gmail = $_POST['gmail'];
        $password = $_POST['password'];

        // Use prepared statement to prevent SQL injection
        $stmt = $con->prepare("SELECT * FROM Employee WHERE Emp_gmail = ?");
        $stmt->bind_param("s", $gmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify password using password_verify()
            if (password_verify($password, $row['Emp_password'])) {
                $_SESSION['gmail'] = $row['Emp_gmail'];
                
                header('Location: ./views/admin/index.php');
                exit();
            } else {
                echo "<script>alert('Incorrect password!');</script>";
            }
        } else {
            echo "<script>alert('Email not found!');</script>";
        }
    }
}
?>


<body>
    <div class="container floating">
        <div class="header">
            <h2>Welcome Back</h2>
            <p>Sign in to continue</p>
        </div>

        <form method="post">
            <div class="input-group">
                <input type="gmail" required name="gmail">
                <label>Username</label>
            </div>

            <div class="input-group">
                <input type="password" required name="password">
                <label>Password</label>
            </div>

            <div class="forgot-pass">
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="btn" id="loginBtn">LOGIN</button>

            <div class="signup-link">
                Don't have an account? <a href="#">Sign Up</a>
            </div>

            <div class="social-login">
                <div class="social-icon facebook">f</div>
                <div class="social-icon google">G</div>
                <div class="social-icon twitter">t</div>
            </div>
        </form>
    </div>




    <!-- 

    <script>
        // Change background color on focus
        const inputs = document.querySelectorAll('input');
        const body = document.querySelector('body');
        const container = document.querySelector('.container');
        const colors = ['#6e8efb, #a777e3', '#FF6B6B, #FFE66D', '#1A2980, #26D0CE', '#FF8008, #FFC837'];
        let colorIndex = 0;

        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                colorIndex = (colorIndex + 1) % colors.length;
                body.style.background = `linear-gradient(135deg, ${colors[colorIndex]})`;
            });
        });
        // Login button effect
        const loginBtn = document.getElementById('loginBtn');
        loginBtn.addEventListener('mousedown', () => {
            loginBtn.style.transform = 'scale(0.95)';
        });

        loginBtn.addEventListener('mouseup', () => {
            loginBtn.style.transform = 'scale(1)';
        });

        loginBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const username = document.querySelector('input[type="text"]').value;
            if (username) {
                loginBtn.textContent = `WELCOME ${username.toUpperCase()}!`;
                setTimeout(() => {
                    loginBtn.textContent = 'LOGIN';
                }, 2000);
            }
        });
    </script> -->
</body>

</html>