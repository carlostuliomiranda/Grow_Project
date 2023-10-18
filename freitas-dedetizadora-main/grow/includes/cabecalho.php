<?php require_once('classes/Controlador.php') ?>
<html>
    <header class="header p-3">
        <div class="d-flex align-items-center gap-3">
            <a href="index.php"><img src="arquivos/logo-grow.png" alt="Grow Agency" width="90px"></a>
            <h1 class="text-center">Sistema de gerenciamento <span class="text-laranja glow-laranja">GROW!</span></h1>
            <span class="mb-0 ms-auto d-none d-sm-inline">Bem vindo, <strong><?php echo Controlador::GetNome(); ?></strong></span>
            <a class="mb-0" style="text-align: center; cursor: pointer" href="php/logout.php">
                <i class="fa-solid fa-door-open"></i>
            </a>
        </div>
    </header>
</html>