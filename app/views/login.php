 <html>
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <link href="<?php echo BASE_URL;?>/public_html/assets/css/login.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="loginarea">
            <form method="POST">
                <input type="email" name="email" placeholder="Digite seu e-mail"/>
                <input type="password" name="password" placeholder="Digite sua senha"/>
                <input type="submit" value="Entrar"/><br/>
                <?php if(isset($error)&& !empty($error)): ?> 
                <div class="warning"><?php echo 'email ou senha errados'; ?></div>
                <?php endif; ?>
            </form>
        </div>
    </body>
</html>


