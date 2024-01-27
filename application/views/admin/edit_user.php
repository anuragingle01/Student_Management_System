<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <!-- CSS styles for the edit user page -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
            display: flex;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex: 1;
            /* Allow the form to take remaining space */
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

        .sidebar {
            background-color: #054871;
            color: #ffffff;
            padding: 20px 10px;
            min-height: 150vh;
            margin-top: -40px;
            margin-left: -30px;
            margin-bottom: -50px;

        }

        .sidebar h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 25px;
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

        /* Add styles for active link in the sidebar */
        .sidebar a.active {
            background-color: #FF5050;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h1>Edit Student Details</h1>
        <a href="<?php echo base_url('index.php/admin/dashboard'); ?>">Students</a>
        <a href="<?php echo base_url('index.php/admin/teachers_dashboard'); ?>">Teachers</a>
        <a href="<?php echo base_url('index.php/admin/logout'); ?>">Logout</a>
    </div>

    <div class="container">


        <?php if ($this->session->flashdata('error_msg')) { ?>
            <div class="error-msg"><?php echo $this->session->flashdata('error_msg'); ?></div>
        <?php } ?>

        <?php echo form_open_multipart('admin/update/' . $user['id']); ?>
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>">
        </div>

        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>">
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>">
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <input type="radio" name="gender" value="Male" <?php if ($user['gender'] == 'Male') echo 'checked'; ?>>
            <label>Male</label>
            <input type="radio" name="gender" value="Female" <?php if ($user['gender'] == 'Female') echo 'checked'; ?>>
            <label>Female</label>
        </div>
        <div class="form-group">
            <label>Courses:</label>
            <select name="courses[]" multiple>
                <?php foreach ($all_courses as $course) { ?>
                    <option value="<?php echo $course['course_id']; ?>" <?php if (in_array($course['course_id'], $user_courses)) echo 'selected'; ?>>
                        <?php echo $course['course_name']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>


        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" value="<?php echo $user['address']; ?>">
        </div>

        <div class="form-group">
            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo $user['phone']; ?>">
        </div>

        <div class="form-group">
            <label>Profile Image:</label>
            <input type="file" name="profile_image">
        </div>

        <input type="submit" name="submit" value="Update" class="submit-btn">
        <?php echo form_close(); ?>
    </div>

</body>

</html>