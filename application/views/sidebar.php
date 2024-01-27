<!DOCTYPE html>
<html>
<head>
    <title>Active Sidebar Menu</title>
</head>
<body>
    <div id="sidebar">
        <ul>
            <li <?php echo ($active_page === 'students') ? 'class="active"' : ''; ?>>
                <a href="<?php echo base_url('students'); ?>">Students</a>
            </li>
            <li <?php echo ($active_page === 'teachers') ? 'class="active"' : ''; ?>>
                <a href="<?php echo base_url('teachers'); ?>">Teachers</a>
            </li>
            <li>
                <a href="<?php echo base_url('logout'); ?>">Logout</a>
            </li>
        </ul>
    </div>
</body>
</html>
