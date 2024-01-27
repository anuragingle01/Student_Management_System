

<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
            display: flex; /* Use flexbox to align sidebar and form side by side */
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1; /* Allow the form to take remaining space */
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

        /* Set styles for the sidebar */
        .sidebar {
            background-color: #054871;
            color: #ffffff;
            padding: 20px 10px;
            min-height: 150vh;
            margin-top: -40px;
            margin-left: -20px;
            margin-bottom: -50px;
            
        }

        .sidebar h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 26.5px;
            margin-left: -10px;
            margin-top: 30px;
        } 

        .sidebar a {
            display: block;
            color: #ffffff;
            padding: 10px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #FF5050;
        }

        .sidebar a.active {
            background-color: #FF5050;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h1>Add Teacher Details</h1>
        <a href="<?php echo base_url('index.php/admin/dashboard'); ?>">Students</a>
        <a href="<?php echo base_url('index.php/admin/teachers_dashboard'); ?>">Teachers</a>
        <a href="<?php echo base_url('index.php/admin/logout'); ?>">Logout</a>
    </div>

    <div class="container">
        <?php echo form_open('admin/add_teacher'); ?>
            <div class="form-group">
                <label>First Name:</label>
                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name">
            </div>

            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name">
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <label>Gender:</label>
                <input type="radio" name="gender" value="Male">
                <label>Male</label>
                <input type="radio" name="gender" value="Female">
                <label>Female</label>
            </div>

            <div class="form-group">
                <label>Address:</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address">
            </div>

            <div class="form-group">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
            </div>

            <input type="submit" name="submit" value="Add" class="submit-btn">
        <?php echo form_close(); ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
