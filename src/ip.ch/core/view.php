<?php
    class View {
        function generate($contentView, $templateView) {
            include 'views/'.$templateView;
        }
    }
?>