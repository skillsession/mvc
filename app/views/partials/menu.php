<nav>
    <div>amazingly menuistic: 
        <a href="/user/register">register</a>
        <?php if(isset($_SESSION['logged_in'])) : ?>
            <a href="/user/logout">logout</a>
            
        <?php else : ?>
            <a href="/user/login">login</a>
        <?php endif; ?>
    </div>
</nav>
<?php
/**
 * The menu file contains the top menu of the project.
 */