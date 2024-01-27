<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 30px;
            margin-left: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0466A2;
            border-top: 1px solid #ddd;
        }



        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="radio"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit-btn {
            padding: 10px 20px;
            background-color: #02876A;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        /* Improved table layout */
        .table-container {
            overflow-x: auto;
        }

        .navbar {
            background-color: #001f3f;
            color: #ffffff;
            padding: 5px;
            text-align: right;
            margin-top: -30px;
            margin-left: -20px;
            margin-right: -20px;
        }


        .pagination {
            justify-content: center;
        }

        .btn-primary {
            margin-right: 10px;
            background-color: #02876A;
        }

        .profile-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }

        .profile-image-td {
            width: 120px;
        }

        td {
            padding: 10px;
            vertical-align: middle;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #FF5050;
        }

        .sidebar {
            background-color: #054871;
            color: #ffffff;
            padding: 20px 10px;
            min-height: 150vh;
            margin-top: -30px;
            margin-left: -20px;
            margin-bottom: -50px;
        }

        .sidebar a {
            display: block;
            color: #ffffff;
            padding: 10px;
            text-decoration: none;
        }

        .table th {
            background-color: #054871;
            color: #ffffff;
            border-top: 1px solid #ddd;
        }

        .sidebar a:hover {
            background-color: #FF5050;
        }

        .active {
            background-color: #FF5050;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h1>Admin Dashboard</h1>
                <a href="#" class="active">Students</a>
                <a href="<?php echo base_url('index.php/admin/teachers_dashboard'); ?>">Teachers</a>
                <a href="<?php echo base_url('index.php/admin/logout'); ?>">Logout</a>
            </div>
            <div class="col-md-10">
                <h2>Students List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Profile Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Courses</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td class="profile-image-td">
                                    <?php if ($user['profile_image']) { ?>
                                        <img src="<?php echo base_url($user['profile_image']); ?>" alt="Profile Image" class="profile-image">
                                    <?php } else { ?>
                                        <img src="default_profile_image.png" alt="No Image" class="profile-image">
                                    <?php } ?>
                                </td>
                                <td><?php echo $user['first_name']; ?></td>
                                <td><?php echo $user['last_name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['gender']; ?></td>
                                <td><?php echo $user['address']; ?></td>

                                <td><?php echo $user['phone']; ?></td>
                                <?php if (isset($courses) && !empty($courses)) { ?>
                                    <div>
                                        <h3>Courses:</h3>
                                        <ul>
                                            <?php foreach ($courses as $course) { ?>
                                                <li><?php echo $course['name']; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <td>
                                    <a href="<?php echo base_url('index.php/admin/edit/' . $user['id']); ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo base_url('index.php/admin/delete/' . $user['id']); ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <div class="text-center">
                    <?php echo $this->pagination->create_links(); ?>
                </div>

                <a href="<?php echo base_url('index.php/admin/add_student'); ?>" class="btn btn-primary">Add Student</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>