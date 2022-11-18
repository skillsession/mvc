<!DOCTYPE html>
<html>
    <head>
        <?php include __DIR__ . '/partials/head.php'; ?>
    </head>
    <body>
        <?php include __DIR__ . '/partials/header.php'; ?>
        <?php include __DIR__ . '/partials/menu.php'; ?>
        
        <div class="container">
        <?php 
        //this loads the view defined by the controller
        include $viewpath;
        ?>
        </div>

        <?php include __DIR__ . '/partials/footer.php'; ?>
    </body>
</html>
<?php 
/**
 * The template defines the general overview of views, and contains a single line
 * for loading the specific view, so that each view is only concerned with its own content
 */