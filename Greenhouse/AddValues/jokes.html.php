<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>List of Jokes</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
    <p><a href="?addValue">Add New Value</a></p>
    <p>Here are the set values in the database:</p>
    <?php 
        foreach ($moisture as $mValue):
    ?>
    <blockquote>
        <p>MOISTURE: 
            <?php 
                echo htmlspecialchars($mValue, ENT_QUOTES, 'UTF-8');
            ?>
        </p>
    </blockquote>
    <?php endforeach; ?>

    <?php
        foreach ($light as $lValue):
    ?>
    <blockquote>
        <p>LIGHT: 
            <?php 
                echo htmlspecialchars($lValue, ENT_QUOTES, 'UTF-8');
            ?>
        </p>
    </blockquote>
    <?php endforeach; ?>

    <?php
        foreach ($temp as $tValue):
    ?>
    <blockquote>
        <p>TEMPERATURE: 
            <?php 
                echo htmlspecialchars($tValue, ENT_QUOTES, 'UTF-8');
            ?>
        </p>
    </blockquote>
    <?php endforeach; ?>

    <?php
        foreach ($humidity as $hValue):
    ?>
    <blockquote>
        <p>HUMIDITY: 
            <?php 
                echo htmlspecialchars($hValue, ENT_QUOTES, 'UTF-8');
            ?>
        </p>
    </blockquote>
    <?php endforeach; ?>

</body>

</html>