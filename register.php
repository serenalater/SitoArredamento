<?php  

//partire la sessione
session_start();

//richiamo del singleton per attivare le PDO
require_once __DIR__ . '/classes/Db.php';


$errors = [];
$success = false;


//SE LA CHIAMATA è POST
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    //recuperare dagli input i valori del form
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $password_confirm = trim($_POST['password_confirm'] ?? '');


    //validazione con messaggi
    if ($name === ''){

        $errors[] = 'Il nome è un campo obbligatorio!';
    }

    if (strlen($password) < 8 ){

        $errors[] = 'La password deve avere almeno 8 caratteri!';
    }

    if ($password !== $password_confirm){

        $errors[] = 'Le password non coincidono!';
    }


    // se la validazione passa interroghiamo il db
    // e quindi errors è vuoto
    if(empty($errors)) {

        //connetto db
        $pdo = Db::connect();
        
        //controllo che l email non sia già registrata
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email');
        $stmt->execute([':email' => $email]);
        
        if($stmt->fetch()){

            $errors[] = 'Questa email è già stata registrata!';

        }else {

            //faccio l hash della pswrd
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            //INSERIMENTO DEL NUOVO UTENTE
            $stmt = $pdo->prepare('INSERT INTO users(name, email, password, role) 
                                   VALUES (:name, :email, :password, :role)');

            $stmt->execute([

                    ':name' => $name,
                    ':email' => $email,
                    ':password' => $passwordHash,
                    ':role' => 'client',

            ]);


            $success = true;
        }
    }
}

?>








<?php include 'header.php'?>
<?php include 'headerpage.php' ?>


<main class="mainProject">
    <section class="bg_personal min-vh-100 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                    <h2 class="fw-bold text-warning text-center mb-4">Register</h2>
                    

                    <?php if($success): ?>
                        <div class="alert alert-success">
                            Registrazione avvenuta con successo! Ora puoi effettuare il  
                            <a href="login.php" class="alert-link">login</a>
                        </div>
                    <?php endif; ?>



                    <?php if(!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul>

                                <?php foreach ($errors as $error): ?>
                                    
                                    <li>
                                        <?= htmlspecialchars($error) ?>
                                    </li>
                                    
                                <?php endforeach; ?>
                                
                            </ul>
                            
                        </div>
                    <?php endif; ?>


                    <form action="" method="post">

                        <div class="mb-3">
                            <label for="name">Name : </label>

                                <input  type="text" 
                                        class="form-control" 
                                        name="name"
                                        value="<?= htmlspecialchars($POST['name'] ?? '') ?>"
                                        required
                                >
                        </div>

                        <div class="mb-3">
                            <label for="email">Email : </label>
                            <input type="email" class="form-control" name="email" 
                                   value="<?= htmlspecialchars($POST['email'] ?? '') ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password : </label>
                            <input type="password" class="form-control" name="password" 
                                   value="<?= htmlspecialchars($POST['password'] ?? '') ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirm">Confirm Password : </label>
                            <input  type="password" class="form-control" name="password_confirm" 
                                    value="<?= htmlspecialchars($POST['password_confirm'] ?? '') ?>"
                                    required>
                        </div>

                        
                        <button type="submit" class="btn btn-outline-warning w-100">Create Account</button>

                        <p class="mt-3">Hai già un account? Effettua il 
                            <a href="login.php" class="text-warning">Login</a>
                        </p>


                    </form>
                </div>
            </div>
        </div>
    </section>
</main>


<?php include 'footer.php'?>