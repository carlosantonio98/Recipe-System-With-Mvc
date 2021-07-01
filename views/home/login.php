<?php
    require_once "./config.php";
    require_once './models/User.class.php';

    if(isset($_GET['code'])){ 
        $gClient->authenticate($_GET['code']); 
        $_SESSION['token'] = $gClient->getAccessToken(); 
        header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL)); 
    } 
    
    if(isset($_SESSION['token'])){ 
        $gClient->setAccessToken($_SESSION['token']); 
    } 
    
    if($gClient->getAccessToken()){ 
        // Get user profile data from google 
        $gpUserProfile = $google_oauthV2->userinfo->get(); 
        
        // Initialize User class 
        $user = new User(); 
        
        // Getting user profile info 
        $gpUserData = array(); 
        $gpUserData['oauth_uid']  = !empty($gpUserProfile['id'])?$gpUserProfile['id']:''; 
        $gpUserData['first_name'] = !empty($gpUserProfile['given_name'])?$gpUserProfile['given_name']:''; 
        $gpUserData['last_name']  = !empty($gpUserProfile['family_name'])?$gpUserProfile['family_name']:''; 
        $gpUserData['email']      = !empty($gpUserProfile['email'])?$gpUserProfile['email']:''; 
        $gpUserData['gender']     = !empty($gpUserProfile['gender'])?$gpUserProfile['gender']:''; 
        $gpUserData['locale']     = !empty($gpUserProfile['locale'])?$gpUserProfile['locale']:''; 
        $gpUserData['picture']    = !empty($gpUserProfile['picture'])? $gpUserProfile['picture'] : '';

        $gpUserData['oauth_provider'] = 'google';
        $userData = $user->checkUser($gpUserData);

        $_SESSION['userData'] = $userData;

        if(!empty($userData)) {
            $output  = '<h2>Google Account Details</h2>';
            $output .= '<div class="ac-data">';
            $output .= '<img src="'. $userData['picture'] .'">';
            $output .= '<p><b>Google ID:</b>'. $userData['oauth_uid'] .'</p>';
            $output .= '<p><b>Name:</b>'. $userData['first_name'] .'</p>';
            $output .= '<p><b>Email:</b>'. $userData['email'] .'</p>';
            $output .= '<p><b>Gender:</b> '.$userData['gender'].'</p>'; 
            $output .= '<p><b>Locale:</b> '.$userData['locale'].'</p>'; 
            $output .= '<p><b>Logged in with:</b> Google Account</p>'; 
            $output .= '<p>Logout from <a href="./controllers/controller.logout.php">Google</a></p>'; 
            $output .= '</div>'; 
        }else{ 
            $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>'; 
        } 
    }else{ 
        // Get login url 
        $authUrl = $gClient->createAuthUrl(); 
        
        // Render google login button 
        $output = '<a class="btn-google" href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="https://img.icons8.com/color/452/google-logo.png" alt=""/> <span class="ml-4">Iniciar sesión con Google</span></a>'; 
    }
    
    $haveAccess = (isset($_SESSION['userData'])) ? true : false;
?>

<?php include $templates_header ?>
<body>
<?php include $templates_navbar ?>
    
<body class="d-flex flex-column h-100">
    <div class="container my-4">
 
        <div class="card login-container">
            <?php
                session_start();
                if (isset($_SESSION['error']) && $_SESSION['error']):
                    session_destroy();
            ?>
            <p class="login-error m-0"><i class="fas fa-times"></i> Credenciales incorrectas</p>
            <?php endif; ?>  

            <div class="card-body">
                <?php if(!$haveAccess): ?>
                    <h1 class="card-title mt-3 pb-1">Iniciar sesión</h1>
                    <form class="login-container__login-form" action="controllers/controller.login.php" method="post">
                        <div class="form-group">
                            <label class="login-container__input-title">Correo</label>
                            <input type="email" class="form-control" name="email" placeholder="Digite su correo..." required>
                        </div>
                        <div class="form-group">
                            <label class="login-container__input-title">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Digite su contraseña..." required>
                        </div>
                        <input type="submit" class="btn btn-success" value="Iniciar">
                        <p class="login-container__or">Or</p>
                        <?= $output ?>
                        <small class="d-block mt-4">No tienes una cuenta? requistrate <a href="?page=crear-usuario">aquí</a></small>
                    </form>
                <?php else: ?>
                    <?= $output ?>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <div class="text-center">
                <div class="mb-3">
                    <a href="#" class="btn btn-outline-white mx-2 rounded-circle"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" class="btn btn-outline-white mx-2 rounded-circle"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-white mx-2 rounded-circle"><i class="fab fa-instagram"></i></a>
                </div>
                <span class="text-muted">Copyright &copy; Finder Food 2021</span>
            </div>
        </div>
    </footer>

<?php include $templates_footer ?>
</body>
</html>