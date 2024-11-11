# Pet-Home E-commercial & Social Platform

## Description
This Pet-Home E-commercial & Social platform is a website about pet community that provides a platform where users can share posts about pet interaction and experience. The website contains several pages such as home page, forum page, blog page, user page and store page. Users can view different posts including pet playing tips, pet products benefits etc. There is also a user profile page where users can edit their information such as username, email, address, etc. The site also offers a product page that showcases a variety of pet products such as cat food and dog food. The entire project was developed using HTML, CSS and PHP, and the back-end database uses MySQL to store user and post data.

## Installation

### Prerequisites
- Apache server (XAMPP recommended)
- PHP (version 7.4 or higher)
- MySQL (MariaDB or MySQL proper)
- PHPMAILER [link to github repo](https://github.com/PHPMailer/PHPMailer)

### Setup Instructions

1. **Extract the project:**
   - Extract the project into your web server directory, typically `xampp/htdocs` if you are using XAMPP.

2. **Setting up the environment:**
   - Start the Apache and MySQL modules via the XAMPP control panel.

3. **Database Setup:**
   - Open phpMyAdmin from your XAMPP control panel.
   - Create a new database named `webproject`.
   - Import the `webproject.sql` file or copy its content to SQL query page in php MyAdmin. This file contains all the necessary tables and schema required for the application.

4. **Configuring the Application:**
   - Ensure the `CISC3003-GroupProject-Team01/images` directory has appropriate write permissions set, adjust it in graphic user interface or as follows:
     ```bash
     chmod -R 755 /path/to/xampp/htdocs/CISC3003-GroupProject-Team01/images/
     ```
   - Set SMTP to enable automatically email verify. The setting needs to be changed in `CISC3003-GroupProject-Team01/WebContent/Signup.php` and `CISC3003-GroupProject-Team01/WebContent/Reset.php`. Default settings:
     ```
            $mail->CharSet ="UTF-8";
            $mail->SMTPDebug = 0;
            $mail->isSMTP(); 
            $mail->Host = 'YourSMTPServer'; // e.g. smtp.qq.com
            $mail->SMTPAuth = true;     
            $mail->Username = 'YourEmail@gmail.com';  
            $mail->Password = 'YourSMTPCode';  
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465; 
            $mail->setFrom('YourEmail@gmail.com', 'Mailer'); 
            $mail->addAddress($Email, $username);
            //$mail->addAddress('ellen@example.com');
            $mail->addReplyTo('YourEmail@gmail.com', 'info');
     ```

1. **Accessing the Project:**
   - Open a web browser and navigate to `CISC3003-GroupProject-Team01/WebContent/HomePage.php` to access the application.
   - Explore the functionalities like sign up, log in, post a blog.


## Features
- **Connection with Database**: User activations are linked with MySQL database.
- **Dynamic Webprogram**: Webpage do self-adjustment based on the status of user.
- **Responsive Design**: Webpage able to fit multiple width browser.
- **Email Activation**: Automatically verify email sending function.
- 

## Contact
For any further assistance or queries, please feel free to contact the CISC3003-2024-Group01!