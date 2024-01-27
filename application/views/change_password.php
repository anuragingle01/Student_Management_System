<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <!-- CSS styles for the change password page -->
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

        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #02876A;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Change Password</h1>
        
        <?php if($this->session->flashdata('error_msg')) { ?>
            <p style="color: red;"><?php echo $this->session->flashdata('error_msg'); ?></p>
        <?php } ?>
        
        <?php if($this->session->flashdata('success_msg')) { ?>
            <p style="color: green;"><?php echo $this->session->flashdata('success_msg'); ?></p>
        <?php } ?>
        
        <form action="<?php echo base_url('index.php/profile/update_password'); ?>" method="post">
            <div class="form-group">
                <label for="current_password">Current Password:</label>
                <input type="password" name="current_password" id="current_password">
            </div>

            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" name="new_password" id="new_password">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password">
            </div>

            <input type="submit" value="Change Password">
        </form>
    </div>
</body>
</html>
