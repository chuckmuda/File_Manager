# File_Manager
File hosting application for managing files in a database.
In order for this application to work, correct configs need to be added to connect.php, download.php, zip_download.php and delete_data.php.
Bootstrap assets and applicable CSS pages may not be uploaded here yet.

Page Operations:

connect.php:

  Database configs are empty for public viewing. Establishes the PDO connection to the hosted database.

view_data.php:

  Main page for admin after logging in with proper credentials. Log in pages coming soon if not already posted. view_data is responsible for pulling from the database and ordering information by descending alphabetical order for the names of the files. Utilizing a PDO connection to the database, the application gives the option to Download all as ZIP folder utilizing checkboxes, Download individually, Edit and Delete. 
  
delete_data.php:

  Upon selecting Delete on view_data.php, this triggers the script on delete_data.php
  
zip_download.php:

  Upon selecting Download as ZIP on view_data.php, this triggers the script to download all selected files and place into a zip folder.
  
download.php:

  This is a script that is triggered from the Download button on the view_data.php page.
  
edit_data.php:

   Upon selecting the Edit button on the view_data.php page, this triggers a new page where the user can edit the selected file and replace with a new file. A textbox should have the current file name automatically placed in the box and the name of the physical file in the folder displayed. Selecting Submit replaces existing data in the database and the hosted folder where the file is stored.
  
form_upload.php:

   Upon selecting the Upload More Files button that is located on view_data.php and edit_data.php, this will trigger the form_upload.php page to load which will display a text box for typing in a name for the file that will be displayed on view_data.php. The physical file's name will come from the file chosen to be uploaded. This will differentiate between what is displayed on the public page and what is the actual file name in the hosted folder.
   
update_submit.php:

  This is a php script that will trigger when the Submit button is selected on both edit_data.php and form_upload.php.
