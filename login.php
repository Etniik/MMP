<?php include 'include/db.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    if ($SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['passoword'];
    }
    $sql = 'SELECT * FROM users WHERE email = ?';
    $stmt = $pdo->prepare($sql);
    $stmt = $sql->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if($email && password_verify($password,$user['password'])){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] =$user ['role'];
        echo "<div class = 'alert alert-sucessful'>Login sucessful! <a href='index.php'>Go Home</a></div>";
        }else{
            echo "<div class = 'alert alert-danger'>Invalid email or password</div>";
        }
    
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center">Login</h2>
                        <form method="POST">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email:" class="form-control" required>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Email:" class="form-control" required>
                            <button type="submit" class="btn btn-primary mb-3 w-100"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>