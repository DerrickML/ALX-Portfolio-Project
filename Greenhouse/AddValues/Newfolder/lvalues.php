<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Max-Temperature</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
    
    <p><a href="?addLightValue">Add New Light Value</a></p>
    <p>Here are the set values in the database:</p>
    <?php
        foreach ($Mlight as $lValue):
    ?>
    <blockquote>
        <p>Light Intensity: 
            <?php 
                echo htmlspecialchars($lValue, ENT_QUOTES, 'UTF-8').' LUX';
            ?>
        </p>
    </blockquote>
    <?php endforeach; ?>

</body>

</html>