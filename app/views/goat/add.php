<h1>ADD A GOAT!!</h1>

<form method="post" action="/goat/add_goat">
    <div>    
        <label for="name">name</label>
        <input id="name" name="name">
    </div>
    <div>    
        <label for="type">type</label>
        <input id="type" name="type">
    </div>
    <button type="submit">CREATE</button>
    
</form>

<table >
    <thead >
        <tr>
        <?php foreach($viewbag['goats'][0] as $header => $value) : ?>
        
            <th><?=$header?></th>
        
        <?php endforeach; ?>
        </tr>
    </thead>
    
    <?php foreach ($viewbag['goats'] as $result) : ?>
    
        <tr>
            <?php foreach ($result as $value) : ?>
                <td><?=$value?></td>
            <?php endforeach; ?>
        </tr>
    
    <?php endforeach; ?>
</table>