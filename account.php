<?php include 'header.php' ?>
<?php include 'headerpage.php' ?>
<main>


    <h2>Contatti</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, reprehenderit necessitatibus possimus sequi, mollitia sit nemo eveniet corporis laboriosam quibusdam voluptatem consequatur delectus accusamus itaque. Repudiandae autem laborum sit soluta.</p>
    <div class="container">
    <h2 class="text-center">Login</h2>
    <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Login</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <h2 class="text-center">Non hai ancora un account? registrati</h2>
    <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Registrazione</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Enter your email">
                        </div>
                         <div class="mb-3">
                            <label for="cognome" class="form-label">Cognome</label>
                            <input type="text" class="form-control" id="cognome" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="sceglipassword" class="form-label">Password</label>
                            <input type="text" class="form-control" id="sceglipassword" placeholder="Enter your password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</main>
<?php include 'footer.php' ?>