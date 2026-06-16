





<?php


//partire la sessione
session_start();

//richiamo del singleton per attivare le PDO
require_once __DIR__ . '/classes/Db.php';


$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    //recupero degli input
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    //validazione di entrambi i campi
    if($email === '' || $password === ''){

        $errors = 'Email and password are required!';

    }else {

        //connetto db
        $pdo = Db::connect();

        $stmt = $pdo->prepare('SELECT id, name, email, password, role FROM users WHERE email = :email');
        $stmt->execute([':email' => $email]);

        $user = $stmt->fetch();



        //verifico la password con password_verify
        if($user && password_verify($password, $user['password'])){


            //rigenero la session per protezione e sicurezza
            // session_rigenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];


            //login riuscito
            header('Location: dashboard.php');
            exit;

        }
        $errors = 'Invalid Credential';

    }
}
?>




<?php include 'header.php'?>
<?php include 'headerpage.php' ?>

<main class="mainProject py-5">
    <section class="bg_personal min-vh-100 py-5">
         <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">

                    <div class="p-4 rounded shadow" style="border: 1px solid #FFC107">
                        <h2 class="fw-bold text-warning mb-4 text-center">Login</h2>
                    </div>

                    <?php if($errors): ?>
                        <div class="alert alert-danger">
                          
                            <?= htmlspecialchars($errors) ?>
                            
                        </div>
                    <?php endif; ?>


                    <form action="" method="post">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input 
                                type="email" 
                                class="form-control" 
                                id="email"
                                name="email"
                                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                                required
                                >
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password"
                                name="password"
                                required
                                >
                        </div>

                        <button type="submit" class="btn btn-outline-warning w-100">Login</button>

                        <p class="mt-3 mb-0">
                            Non hai ancora un account?
                            <a href="register.php" class="text-warning">Register</a>
                        </p>


                    </form>






                </div>

            </div>



         </div>






    </section>

</main>





<?php include 'footer.php' ?>