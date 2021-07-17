# SUBSIDIZED FERTILIZER DISTRIBUTION MANAGEMENT SYSTEM (Web Application) - USER GUIDE

# Initial Setup

- Before using this system, user should paste the folder "Fertilizer_Subsidy" in to 'C:\xampp\htdocs' directory.
- Run the sql script in 'db_e16_022_025_221_222.sql' file to create the database in MySQL server.
- Open XAMPP server and start the service 'APACHE'.
- Edit "connection.php" file in 'C:\xampp\htdocs\Fertilizer_Subsidy\includes' directory changing following attributes.

  1.  $servername = '<HOST_NAME(IP address of the host where MySQL server is situated)>'
  2.  $username = User name to access MySQL server
  3.  $password = Password to access MySQL server

- Type as "http://localhost/Fertilizer_Subsidy/" as the URL in browser search bar to access the web application.

# Instructions to use the Web Application

- There are three tabs in this page.

  - User can view important details related to the Department of Agriculture using "HOME" tab.
  - Agricultural Officers can access to the login page using "LOGIN" tab.
  - User can get extra details related to the Department of Agriculture using "PHOTO GALLERY" tab.

- Other than using the login tab, agricultural officers can access to the login page using "Log In" button in home page.

- Agricultural officers can access their account by using the 'OfficerID' and relevant 'Password' as mentioned in table 'AGRICULTURAL_OFFICER' in the database.

- If the login is successful, user is directed to a page where user can involve in the fertilizer issuing process.

## Farmers Tab

1. Officer can search for farmers using their NIC. Enter NIC and hit "SEARCH" button.
2. If officer want to update details of a searched farmer, user can use "UPDATE" button.
3. If officer want to add a new farmer, user can use "ADD NEW" button to generate next FarmerID.
4. After completing all the details of the farmer, user can hit "SAVE NEW" to add the record to the database.

## Cultivations Tab

1. In this page we can edit and add lands.
2. We can see details about given land by giving land id and clik "search" button. It will list all details about given land.
3. We can change detail of that land.
4. After chenging we should clik "update" button. It will update existing data.
5. We cannot change area of existing land.
6. To add new land or register new land first we should clik "add new",it will give land Id for new land. then we should fill the other details and clik "save new" button. save new button will add new record for data base.

Note: this page can see only officer so button "update" and "save new" will directly connect with database.we cannot delete or remove lands because it not possible, and also we cannot change area of a land.

## Fertilizer Issuing Tab

1. Officer can enter a farmer ID who is requesting for fertilizer.(F005) Hit "SEARCH". If farmer is registered, the name of the farmer is displayed.
2. If that farmer belongs a land which is registered under that agricultural officer, lands are loaded to the drop down menu.
   - That dropdown menu can be used to see the details of the lands. Just select a land id and hit "BROWSE" button only to see that details.
3. That one of the land ids can be entered in text field correctly and can be submitted using "SUBMIT" button.
4. The fertilizers that exists in the supply center is also loaded to the drop down menu.
   - That dropdown menu can be used to see the details of the fertilizers. Just select a fertilizer and hit "BROWSE" button only to see that details.
5. That one of the fertilizers can be entered in text field and can be submitted using "SUBMIT" button.
6. Type required amount for the caltivation to issue and hit "SAVE" button to add data to database.

Important : Refer to the 'Cultivation' table in the database to see the lands that are registered under each agricultural officer.

## View Stock Tab

1. By clicking this button, Officer who log in current session, can see all the Stock Details of fertilizer stock which belngs to him or her.
2. Stock details contain fertilizer stock details and their Expire and Stores dates.
3. By viewing this, Officer can get all decision about current Store and make decision about next stock to purchase.
