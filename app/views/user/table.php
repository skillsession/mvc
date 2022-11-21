<?php
    /**
     * This is an example of a generic table
     * which will print the content of the viewbag
     * without knowing what content to expect
     */
?>
<table >
    <thead >
        <tr>
        <?php foreach($viewbag['users'][0] as $header => $value) : ?>
        
            <th><?=$header?></th>
        
        <?php endforeach; ?>
        </tr>
    </thead>
    
    <?php foreach ($viewbag['users'] as $result) : ?>
    
        <tr>
            <?php foreach ($result as $value) : ?>
                <td><?=$value?></td>
            <?php endforeach; ?>
        </tr>
    
    <?php endforeach; ?>
</table>