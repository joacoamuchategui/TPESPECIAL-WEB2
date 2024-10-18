<?php

class LoginView {

    // Muestra Pagina Login
    public function showLoginForm() {
        include_once './templates/layout/header.phtml';
        include_once './templates/login.phtml';
        include_once './templates/layout/footer.phtml';
    }
}