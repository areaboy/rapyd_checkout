# Rapyd Single Page Checkout

**A Singe Page E-Commerce System Powered by Rapyd’s Hosted Checkout Toolkit and Email Messaging Clients**


This is a **Single Page Carts Checkout** that utilizes **Rapyd’s Hosted Checkout Toolkit & Email-Messaging System**
for the purpose of optimizing the shopping cart and payments checkout process  to make it easy for customers to buy and pay for their products online without living the Checkout page.

This applications also help Site Owner to easily **Create More Sales Conversions, Manage Abandon Carts, Manage Saved Carts, Sales and Payments..**

This application can improve sales conversions by up to **99.99%**




This Application was written with **PHP, Mysql, Jquery/Ajax, Bootstrap 5 etc.**

 For Customers Shppings country Name selection in javascript,
 we use MIT Open source Country Selector javascript script here https://github.com/mrmarkfrench/country-select-js


# How to Install and run the application

1.) Install xammp Server and Ensure That PHP and Mysql Database are running.

2.) Clone this Application from Github repositories and unzip it. 

3.) Download the Email Clients folder **mail_vendor.zip** (We are using php Emailer) from our Website. **https://fredjarsoft.com/mail_vendor.zip** and unzip 
 it directly inside the main application source code folder **(/rapyd_checkout/)** and everything will be fine.
Finally you will have **(rapyd_checkout/mail_vendor)**

               OR

Alternatively, You can download the Entire Applications Source Code  from our Website. No need of downloading the mail_vendor.zip seperately.

**https://fredjarsoft.com/rapyd_checkout.zip**


4.) Edit **data6rst.php** file to update your Mysql Database Connection Credentials

5.) Edit **rapyd_access_keys.php** file to update your Rapyd Access secrets and Keys. **( Optinonally, You can protect keys and secret using .htaccess files in production or Your can save it in database and then query it in the application)**

6. Edit **rapyd_settings.php** file  to configure all the application settings where appropriates.

7.) Import **rapyd_checkout_database.SQL** to install allthe database tables

8.) You are done!!!.


9.) Call up the application at browser and it will be running  at **http://localhost/rapyd_checkout/index.php**

10.) Admin Section is for the site owner....
