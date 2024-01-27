
<!DOCTYPE html>
<html>
<head>
    <title>View Profile</title>
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

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info p {
            margin-bottom: 10px;
        }

        .profile-info img {
            display: block;
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 5px;
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

        input[type="text"],
        input[type="email"],
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
        <h1>View Profile</h1>
        
        <?php if($user) { ?>
            <div class="profile-info">
                <p><strong>First Name:</strong> <?php echo $user['first_name']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $user['last_name']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
                <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
                <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
                <?php if ($user['profile_image']) { ?>
                    <img src="<?php echo base_url($user['profile_image']); ?>" alt="Profile Image">
                <?php } ?>

            </div>
            
            <h2>Update Profile</h2>
           
            <?php echo form_open_multipart(base_url('index.php/profile/update')); ?>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" value="<?php echo $user['first_name']; ?>">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" value="<?php echo $user['last_name']; ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>">
                </div>

                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <input type="radio" name="gender" id="gender_male" value="Male" <?php if($user['gender'] == 'Male') echo 'checked'; ?>>
                    <label for="gender_male">Male</label>
                    <input type="radio" name="gender" id="gender_female" value="Female" <?php if($user['gender'] == 'Female') echo 'checked'; ?>>
                    <label for="gender_female">Female</label>
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $user['phone']; ?>">
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea name="address" id="address"><?php echo $user['address']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="profile_image">Profile Image:</label>
                    <input type="file" name="profile_image" id="profile_image">
                </div>

                <input type="submit" value="Update">
            <?php echo form_close(); ?>
        <?php } else { ?>
            <p>Error retrieving user data.</p>
        <?php } ?>
    </div>
</body>
</html>
