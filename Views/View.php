<?php

    namespace App\Views;

    class View {
        function generate($contentView, $templateView) {
            require 'Templates/'.$templateView;
        }
    }
?>