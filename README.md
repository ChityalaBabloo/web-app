<pre>
Make Sure You Have A Active Internet Connection.
Make Sure You Placed This Project Folder In htdocs Of Server(XAMPP/WAMPP etc.)

//Import Database
1.open phpMyAdmin and create a database with name 'testdb'
2.click on import and choose file testdb.sql

//SignUp Process
1.Click on index.php file and open it in your browser.
2.Fill up the form and Press SIGNUP to register.

//Login Process
1.Enter your valid credentials and press login to continue.
2.Based on your role you will be redirected to respective page.

NOTE:
Make a Admin account and login to view the entire project features or use the Admin account which is already created in database.

//Active or Inactive status
1.A user is made as active or inactive based on his logged-in status.
2.If user is logged-in Status will be active else inactive.

// To check this follow the below steps:
1.Open a browser and login to your account. As soon as you logged-in your status will be changed in users table(In testdb database) and vice-versa.
2.Now open Incognito tab or another browser to simultaneously log-in to another account.
REASON: Beacause log-in system is based on sessions. Once you open a browser it will use same session till you close or you log-out.
Opening a new tab will use the same session.So use use another browser. To Know more about this go through sessions concept.

//Inorder to send Email Make Sure
1.Open SendMail.php file and enter your valid gmail credentials in username and passsword(line no. 21 & 22)
NOTE: Your email should not have two-step verification and allow less secure apps in email settings.

//comments
1.When a user posts a comment, It is displayed with red-border indicating as it is not seen by any other users.
2.As soon as a user sees it the comment will be displayed with green border.

//Import users
1.please choose a csv file or use users csv file in project folder(PHP).
2.Insert values accordingly to csv to see changes.

//To import the same downloaded excel file.
1.open the file and remove columns id,profile and status.
2.remove first row too.Now save file as csv and import.

//To suggest names in name field
1.open names.txt and enter names.
</pre>
