<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #02876A; /* Change heading color */
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
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            /* Add placeholder styles */
            color: #888;
        }

        /* Placeholder styles for modern browsers */
        ::placeholder {
            color: #888;
        }

        /* Placeholder styles for Internet Explorer */
        :-ms-input-placeholder {
            color: #888;
        }

        .error-msg {
            color: red;
            margin-bottom: 10px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
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
        <h1>Login</h1>

        <?php if($this->session->flashdata('error_msg')) { ?>
            <div class="error-msg"><?php echo $this->session->flashdata('error_msg'); ?></div>
        <?php } ?>

        <?php echo form_open('login/authenticate'); ?>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="Enter Email ID">
                <?php echo form_error('email', '<div class="error-msg">', '</div>'); ?>
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" placeholder="Enter Password">
                <?php echo form_error('password', '<div class="error-msg">', '</div>'); ?>
            </div>

            <input type="submit" name="submit" value="Login" class="submit-btn">
        <?php echo form_close(); ?>
        <p>Don't have an account? <a href="<?php echo base_url('index.php/register'); ?>">Sign Up</a></p>
    </div>
</body>
</html>
