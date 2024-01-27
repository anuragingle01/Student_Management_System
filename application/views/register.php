<!DOCTYPE html>
<html>

<head>
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
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
        input[type="password"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="radio"] {
            margin-top: 5px;
        }

        textarea {
            height: 100px;
        }

        .error-msg {
            color: red;
            margin-bottom: 10px;
        }

        .success-msg {
            color: green;
            margin-bottom: 10px;
        }

        .submit-btn {
            margin-top: 10px;
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Student Registration Form</h1>

        <?php if (validation_errors()) { ?>
            <div class="error-msg"><?php echo validation_errors(); ?></div>
        <?php } ?>

        <?php if ($this->session->flashdata('success_msg')) { ?>
            <div class="success-msg"><?php echo $this->session->flashdata('success_msg'); ?></div>
        <?php } ?>

        <?php echo form_open_multipart('register/save'); ?>

        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>">
        </div>

        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>">
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo set_value('email'); ?>">
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <input type="radio" name="gender" value="Male" <?php echo set_radio('gender', 'Male'); ?>>Male
            <input type="radio" name="gender" value="Female" <?php echo set_radio('gender', 'Female'); ?>>Female
        </div>

        <div class="form-group">
            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo set_value('phone'); ?>">
        </div>
        <div class="form-group">
            <label>Choose Course:</label>
            <select name="course_id">
                <option value="">Select Course</option>
                <?php foreach ($courses as $course) : ?>
                    <option value="<?php echo $course['course_id']; ?>" <?php echo set_select('course_id', $course['course_id']); ?>>
                        <?php echo $course['course_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Address:</label>
            <textarea name="address"><?php echo set_value('address'); ?></textarea>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password">
        </div>

        <div class="form-group">
            <label>Confirm Password:</label>
            <input type="password" name="confirm_password">
        </div>

        <div class="form-group">
            <label>Profile Image:</label>
            <input type="file" name="userfile">
        </div>

        <input type="submit" name="submit" value="Register" class="submit-btn">

        <?php echo form_close(); ?>
    </div>
</body>

</html>