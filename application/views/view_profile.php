

<!DOCTYPE html>
<html>
<head>
    <title>View Profile</title>
    <style>
        /* CSS styles for the view profile page */
        /* ... */
        * {
            margin: 0;
            padding: 0;
        }

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

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info p {
            margin-bottom: 10px;
        }

        .profile-info strong {
            font-weight: bold;
        }

        .profile-info img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 50%;
            object-fit: cover;
        }

        .update-profile-btn {
            display: block;
            margin: 0 auto;
            text-align: center;
            padding: 10px 20px;
            background-color: #02876A;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
        }

        .update-profile-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Profile</h1>
        
        <?php if($user) { ?>
            <div class="profile-info">
                <?php if($user['profile_image']) { ?>
                    <img src="<?php echo base_url($user['profile_image']); ?>" alt="Profile Image">
                <?php } ?>

                <p><strong>First Name:</strong> <?php echo $user['first_name']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $user['last_name']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
                <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
                <p><strong>Address:</strong> <?php echo $user['address']; ?></p>
            </div>
            
            <a href="<?php echo base_url('index.php/profile/edit'); ?>" class="update-profile-btn">Update Profile</a>
        <?php } else { ?>
            <p>Error retrieving user data.</p>
        <?php } ?>
    </div>
</body>
</html>
