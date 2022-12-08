<div class="table">
    <table>
        <tr2>
            <th>ID</th>
            <th>Date/Time</th>
            <th>Ligth Levels</th>
        </tr2>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['timestamp']; ?></td>
            <td><?php echo $row['LightIntensity']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
<ul class="pagination">
    <?php if ($page > 1): ?>
    <li class="prev"><a href="index.php?page=<?php echo $page-1 ?>">Prev</a></li>
    <?php endif; ?>

    <?php if ($page > 3): ?>
    <li class="start"><a href="index.php?page=1">1</a></li>
    <li class="dots">...</li>
    <?php endif; ?>

    <?php if ($page-2 > 0): ?><li class="page"><a href="index.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a>
    </li><?php endif; ?>
    <?php if ($page-1 > 0): ?><li class="page"><a href="index.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a>
    </li><?php endif; ?>

    <li class="currentpage"><a href="index.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

    <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a
            href="index.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
    <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a
            href="index.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

    <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
    <li class="dots">...</li>
    <li class="end"><a
            href="index.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a>
    </li>
    <?php endif; ?>

    <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
    <li class="next"><a href="index.php?page=<?php echo $page+1 ?>">Next</a></li>
    <?php endif; ?>
</ul>
<?php endif; ?>