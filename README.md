# auto-sms-wisher
PHP based AUTO SMS WISHER using pingsms.in API

auto-sms-wisher is created fully using PHP. The code written here is for Birthday Wishes but can be easily configured to serve other purposes.

# **FEATURES**

1. MD5 based login system.
2. Send Quick SMS wishes.
3. Send Sheduled SMS wishes.
4. Variable based message.
5. Quick Edit Client details. 
6. Quick Edit API Key, Message format.
7. CSV based BULK Upload of client birthdays.
8. Only User panel currently available.(Admin needs to add user via phpmyadmin)

# **GETTING STARTED**
Read carefully and follow all steps.

# **1.BACKEND**
    - Import auto-sms-wisher.sql file in your Database.
    - Go to **api/** folder and enter your DB credentials 
    (BY DEFAULT: USER: root, DBNAME: bday, PASSWORD: )
    - db_connect.php
    - login_check.php
    - db.class.php
    - msg_echo.php
    - api_echo.php
      
 # **2.FRONTEND**
    - Upload all files and folder in your public folder.
    - In **nav/header.php** edit $url and include your website address.
      (BY DEFAULT $url=http://localhost/auto-sms-wisher)
    - Enter your credentials and login.
    
 # **3.USER CREATION**
    - Goto phpmyadmin.
    - Navigate to your db.user_table.
    - Goto insert and in password section make sure you select the md5 function. 
    (DEFAULT USER: USERNAME:demo1,PASSWORD:demo@123)
    
 # **4.ENABLE AUTO MESSAGING**
    - ADD a new cronjob (eg:-Everyday at 10 am)
      (0 10 * * * wget -O - http://your.url/api/auto_wishes_user_start.php?key=shshajh328jjkq91)
      
  
  **ENJOY :)**
