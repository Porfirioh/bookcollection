<h2><?php echo ucfirst($title); ?></h2>
<?php 
    if (isset($books))
        foreach ($books as $book)
            echo $book;
    else
        echo '<h3>'.'No Books In This Category!'.'</h3>';
?>