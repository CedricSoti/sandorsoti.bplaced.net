<?php
// App/control/HomeController.php

class HomeController
{
    public function index()
    {
        // hier kannst du später z.B. Models laden, Daten verarbeiten etc.
        // für den Anfang wird einfach die View eingebunden:
        require __DIR__ . '/../view/home.php';
    }
}
