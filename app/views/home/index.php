<h1>Home Controller Index Method</h1>

<?php
    /**
     * Anything included in the $viewbag, passed from the controller
     * is available here.
     */
?>
<p>Parameter 1: <?=$viewbag['param_a'] ?? '' ?> </p>
<p>Parameter 2: <?=$viewbag['param_b'] ?? '' ?> </p>

<pre>
    <?php 
    print_r($viewbag); 
    ?>
</pre>

<img src="/public/assets/fish.jpg" alt="it's a fish"/>