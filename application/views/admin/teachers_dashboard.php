<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard 2</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }

         h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #FF5050; 
        }
        h1 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 30px;
            margin-left: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 1px solid #333;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #333;
        }
        
        th {
            background-color: #0466A2;
            border-top: 1px solid #333; 
            color: #ffffff;
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

        .error-msg {
            color: red;
        }

        .add-teacher-btn {
            display: block;
            text-align: right;
            margin-top: 20px;
        }

        .undo-link {
            color: #4CAF50;
            text-decoration: none;
            font-size: 18px;
        }

        .edit-btn {
            padding: 8px 12px;
            background-color: #02876A;
            color: #ffffff;
            border: 1px solid #4CAF50;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
        }
        .delete-btn {
            padding: 8px 12px;
            background-color: #EA1A43;
            color: #ffffff;
            border: 1px solid #4CAF50;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
        }

        .edit-btn:hover {
            background-color: #3141F8;
            color: #ffffff;
        }
        .delete-btn:hover {
            background-color: #EA1A43;
            color: #ffffff;
        }
        .navbar {
            background-color: #001f3f;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            margin-bottom: 10px;
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
            border-top: 1px solid #333;
        }

        .sidebar a:hover {
            background-color: #FF5050 ;
        }

        .active {
            background-color: #FF5050 ;
        }
        
        
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            <h1>Admin Dashboard</h1>
            <a href="<?php echo base_url('index.php/admin/dashboard'); ?>">Students</a>
            <a href="#" class="active">Teachers</a>
            <a href="<?php echo base_url('index.php/admin/logout'); ?>">Logout</a>
        </div>
        <div class="col-md-10">
            <h2>Teachers List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teachers as $teacher) { ?>
                        <tr>
                            <td><?php echo $teacher['id']; ?></td>
                            <td><?php echo $teacher['first_name']; ?></td>
                            <td><?php echo $teacher['last_name']; ?></td>
                            <td><?php echo $teacher['email']; ?></td>
                            <td><?php echo $teacher['gender']; ?></td>
                            <td><?php echo $teacher['address']; ?></td>
                            <td><?php echo $teacher['phone']; ?></td>
                            <td>
                                <a href="<?php echo base_url('index.php/admin/edit_teacher/'.$teacher['id']); ?>" class="edit-btn">Edit</a>
                                <a href="<?php echo base_url('index.php/admin/delete_teacher/'.$teacher['id']); ?>" onclick="return confirm('Are you sure you want to delete this teacher?')" class="delete-btn">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <form method="post" action="<?php echo base_url('index.php/admin/import_teachers'); ?>" enctype="multipart/form-data">
                <label for="teacher_file">Import Teachers:</label>
                <input type="file" name="teacher_file" id="teacher_file">
                <input type="submit" name="submit" value="Import">
            </form>

            <div class="add-teacher-btn">
                <a href="<?php echo base_url('index.php/admin/add_teacher_page'); ?>" class="submit-btn">Add Teacher</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
