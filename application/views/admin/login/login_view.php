<!DOCTYPE html>
<html>
    <head>
        <!-- Meta -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <base href="<?= base_url(); ?>" /> 
        <!-- End of Meta -->

        <!-- Page title -->
        <title>Viver em Cobertura - CMS</title>
        <!-- End of Page title -->

        <!-- Libraries -->
        <link type="text/css" href="assets/js/admin/plugins-jquery/facybox/facybox.css" rel="stylesheet" />
        <link type="text/css" href="assets/css/admin/login.css" rel="stylesheet" />
        <link type="text/css" href="assets/css/admin/smoothness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />

        <script type="text/javascript" src="assets/js/admin/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="assets/js/admin/easyTooltip.js"></script>
        <script type="text/javascript" src="assets/js/admin/jquery-ui-1.7.2.custom.min.js"></script>
        <script type="text/javascript" src="assets/js/admin/plugins-jquery/facybox/facybox.js"></script>
        <script type="text/javascript" src="assets/js/admin/plugins-jquery/mask/jquery.mask.js"></script>
        <script type="text/javascript" src="assets/js/admin/plugins-jquery/rsv/jquery.rsv.uncompressed.js"></script>

        <!-- Date Picker - JQuery -->
        <link type="text/css" href="assets/js/admin/uidatepicker/ui.all.css" rel="stylesheet" />
        <script type="text/javascript" src="assets/js/admin/uidatepicker/ui.core.js"></script>
        <script type="text/javascript" src="assets/js/admin/uidatepicker/ui.datepicker.js"></script>

        <!-- Funções gerais do sistema -->
        <script type="text/javascript" src="assets/js/admin/functions.js"></script>

        <!-- End of Libraries -->

        <?php
        if (@$msg) {
        ?>
            <script>
                abrir("<?= $msg ?>");
            </script>
        <?php
            }
        ?>
    </head>
    <body>
        <div id="container">
            <div class="logo"></div>
            <div id="box">
                <form action="admin/login/logar" method="POST">
                    <p class="main">
                        <label>Usuário: </label>
                        <input name="usuario_login" id="usuario" value="" />
                        <label>Senha: </label>
                        <input type="password" name="usuario_senha" id="senha" value="" />
                    </p>
                    <p class="space">
                        <input type="submit" value="Login" class="login" />
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>