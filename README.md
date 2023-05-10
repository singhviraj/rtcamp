Title

In the project the user will get email of a random comic after every minute on the registered email address when the user will validate its identinety through login his/her account.


In the project I have created 4 pages
create account
verify2sv
index
startcode


The working of the project is described below-

the user will login on the index page and will get an iput field where the user will enter the number of times user wants to receive emails .
The user will receive a random comic as an inline image and an attachment on the registered email after every minute if the user successfully log's in .

The user have to create an account if the user does not have an account and to create the account the user have to click on the create account link and the user will get the 
sign up form to submit the details including email ,name ,password .Once the user submits the detail ,the php script will verify the password with the renentered password and the format of the email .
If the detail matches then the user will get get a 2sv code on the registerde email .If the code will be correct ,a tuple for the user will be created in the database which our index page will use
to fetch details when the user log's in from the next time.
 

Issues I faced and things I learned .

1)Send an email -
To send the emails using mail function I have to configure the path of sendmail.exe and smtp port in php.ini ,allow imap settings of my gmail from my gmail account so that I may use my email address to receive emails 
,add an app password for my email so that my locat host can use it to send emails as gmail no longer supports the feature of turning on less secure apps .
I refred the youtube video/articles below to configure the email settings in localhost and add an app password using the articles below respectively

https://www.youtube.com/watch?v=dNTZ8X9Xk_Q
https://wpmailsmtp.com/gmail-less-secure-apps/#Option_2_Use_an_App_Password 

2)Make an api call of the xkcd json file(most chalenging for me)

I tried making the api call using curl method but I was getting an error which mentions that I need to enable ssl on my localhost so that 
I could make an api call because the json file was https enscrypted .
To create a self signed certificate for my localhost I have to generate a csr for my localhost but which I was not able to do because I was getting the below error when writting the command to generate a priate key or trying to click on my ssl.exe file in my xamp server.
the application was unable to start correctly (0xc000007b)
 to resolve the error I followed all the methods in the article below and also tried using other methods to make an api call as well

https://www.diskgenius.com/how-to/fix-error-code-0xc000007b.php

In above methods I could not perform Install or repair the Latest Version of .NET Framework(my laptop would not upgrade to mre then 4.7), Update DirectX(did not note down the maximum version to which I could upgrade),Reinstall all Microsoft Visual C++ runtime packages(my laptop's windows 7 would support a mximum version of 2008),
installing the new updated for my windows7(also tried switching the service pack versions on my windows to check if I could update to any the above packages in any sp version but gettin the same type of error upon installation)
because my laptop was not compatible with the latest versions .

I also tried first creating a self signed certificate through my iis manger and then transferring it to my apache using the 
steps below but the ssl commands were not working and giving the same permissionor compatibility  error

To create a self signed certificate on my windows 7 which was having iis7 I used the steps below
https://www.sslshopper.com/article-how-to-create-a-self-signed-certificate-in-iis-7.html
To transfer the certificates I used the steps below
https://www.digicert.com/kb/ssl-support/apache-ssl-export.htm

I tried making an api call and opeining the file using fetch comand with async ()(javascript) and fetching it with XMLhttpRequest()'s object(javascript) but getting he ssl related error.
There were only 3 resolutions left after many weeks of struggle -
1 Update my laptop to windows 10 or latest,
2 Fix it with dll,
3 change my laptop,

I tried replacing the curropted dll files by downloading the new ones from internet or copy pasting from a good pc but whenever 
i restarted the pc the same files were there which most probalby seemed to be the issue .
I finally upgrade the windows to windows 10 and it finally worked .I was able to generate the ssl certificates
.
I refer the video and article beow respectively below to install the ssl certificats on my localhost

https://www.youtube.com/watch?v=TH6evGKgy20
https://velaninfo.com/rs/techtips/how-to-enable-ssl-on-a-wamp-server/

The video shows the steps to install the ssl on wamp but it worked effectively for xamp as well . I started working with wamp
earlier but facing issues with wamp so switched to xamp.Everything written in the artcle has been followed except for
the path mentioned in document root field of virtual host .I changed it from “c:/wamp64/www” to “c://xamp//htdocs” because the php files
which we have o cnnect with the ssl are stored in the htdocs folder in xamp

3) to send an inline image along with attachemnet

To send the image I used html code and encode it inside semicolon and then executed it with a php variable like the example below

$to = "sample@sample.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<img src=$x>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\\r\
";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\\r\
";

// More headers
$headers .= 'From: <abc@example.com>' . "\\r\
";
$headers .= 'Cc: xyz@example.com' . "\\r\
";

mail($to,$subject,$message,$headers);
 
The above will only send an inline image but to send an attachemnet along I have to read about mime proptocol and headers 
in php in detail .
I read the Microsoft article below to read about mime protocol ,codex world example and the article below to
know about the spacing and borders to send the image along with the attachemnet respectively

https://learn.microsoft.com/en-us/previous-versions/office/developer/exchange-server-2010/aa563068(v=exchg.140)
https://www.codexworld.com/send-email-with-attachment-php/
https://www.w3.org/Protocols/rfc1341/7_2_Multipart.html

The above 3 articles were enough for me to understand the concept on sending the images using mail function

4) To know how to create a form for my login page , create account page and use sql along within,use of global variables etc I used w3school tutorials that is the below link
to know all the concepts of php.

https://www.w3schools.com/php/

5) Apart from everything mentioned in the steps above I used my coding skills to add a 2sv form ,sending mails on repeat 
generating a random code to call a random json link etc . The only thing challeging for me was to stop the emails on 
user permsion in the whole logic building but I figured it out as well .

6) I wanted to stop the emails on user permision but when I added the code for sending repeating emails it was getting
into an infinite loop for sending emails .To stop the emails with user's permission I tried the below steps
a)  settings up $_SESSSION variable and the start of email and changing it when clicked on stop button .
b) generating a random code at the start of emails and deleting it at the stop 
c)disable mail function using ini_set but learned that it works when set in php.ini file only and not on the script
d) stopping the emails by checking and disabling the network using the article below

https://www.w3schools.com/php/func_misc_connection_status.asp#:~:text=The%20connection_status()%20function%20returns,by%20user%20or%20network%20error
 I tried the combination as well but getting infinte emails

I read more and found that the emails can not be stopped on a localhost server without killing the process using the process id of the script 
using terminal in unix , task maager and windows or any condition various stach oerflow articles and the below oe specifically

http://www.hackingwithphp.com/2/6/11/infinite-loops#:~:text=As%20infinite%20loops%20never%20terminate,whenever%20a%20condition%20is%20matched

This project was really challeging for me and I learned a lot more then I mentioned in this file. I did not keep a 
real time evaluation of the resources in the readme file of my project however ,I have a real
time evaluation of this project on my whatsapp because I did not started with github from the star and sarted using it when I was in the middle of that project
.
