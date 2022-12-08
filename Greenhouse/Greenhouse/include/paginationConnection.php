<?php
    // Below is optional, remove if you have already connected to your database.
    $mysqli = mysqli_connect('localhost', 'wlgykctu_agro', '@ALXGrow1.', 'wlgykctu_alx');

    // Get the total number of records from our table "students".
    $total_pages = $mysqli->query('SELECT * FROM moisture')->num_rows;

    // Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

    // Number of results to show on each page.
    $num_results_on_page = 9;

    if ($stmt = $mysqli->prepare('SELECT * FROM moisture ORDER BY ID DESC LIMIT ?,?')) {
        // Calculate the page to get the results we need from our table.
        $calc_page = ($page - 1) * $num_results_on_page;
        $stmt->bind_param('ii', $calc_page, $num_results_on_page);
        $stmt->execute(); 
        // Get the results...
        $result = $stmt->get_result();
    }