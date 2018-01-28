<?php 

//Put in your own info for username, password, DB, email@address, Cookiename, 
//the name of this page (currently login.php) and the name of your subscribe 
//or new user page (currently new.php).  I went ahead and included all the HTML 
//so this page should work as is, with only the changes described above needed 

$dblink = mysql_pconnect("localhost","username","password"); 
mysql_select_db("DB"); 

$headers=0; //Make Sure HTML Headers are in place before the form 


//after Authenticating the script automatically sends the browser to   
//the webpage of your choice (note if your page calls this   
//script with ?redirect="foobar.php" it will automatically 
//redirect to foobar.php after authenticating.  Set the default   
//redirect page here 

if ( !isset($redirect)) 
   { 
     $redirect = "index.php"; 
   } 

if (isset($UserID) && isset($Password)) { 

  $query = "select * from members where UserID = \"$UserID\" and Password = 
\"$Password\""; 

  if ( !($dbq = mysql_query($query, $dblink))) { 
    echo "Unable to query database.  Please Contact <a 
href=\"mailto:email@address\">email@address</a>.\n"; 
    exit; 
  }   

  $lim = mysql_num_rows( $dbq ); 

  if ($lim != 1) { 

  $headers=1; //HTML headers in place    
  echo "<HTML><HEAD><TITLE>Login Page</TITLE></HEAD><BODY>"; 
  echo "<B>Invalid User ID or Password. Please Try again</B><BR>"; 

  } 

  if ($lim == 1) { 

//make unique session id and store it in Database 
  $timer = md5(time()); 
  $sid = $UserID . "+" . $timer; 
  SetCookie("Cookiename",$sid,time()+2592000); //Set Cookie for 30 days 
  $query = "update members set sid=\"$timer\" where UserID=\"$UserID\""; 

  if( !($dbq = mysql_query( $query, $dblink))) { 
    echo "Unable to update database.  Please contact <a 
href=\"mailto:email@address\">email@address</a>.\n"; 
  exit; 
  } 

  $headers=1; 
  header("Location: $redirect"); 
  exit; 
  } 

} 

if (isset($Cookiename)) { 
  $headers=1; //make sure HTML headers are in place before the form 
  $sidarray = explode("+", "$Cookiename"); 
  $query = "select * from members where UserID = \"$sidarray[0]\" and sid = \"$sidarray[1] 
\""; 

  if ( !($dbq = mysql_query($query, $dblink))) { 
    echo "Unable to find database.  Please Contact <a 
href=\"mailto:email@address\">email@address</a>.\n"; 
    exit; 
  } 

  if (mysql_num_rows( $dbq ) == 1) { 
    echo "<HTML><HEAD><TITLE>Login Page</TITLE></HEAD><BODY>"; 
    echo "You are already logged in as $sidarray[0].<BR>"; 
    echo "You may logon as another user or simply begin using our services with your current 
session.<BR>"; 
    echo "Click <A Href=\"http://www.mydomain.com/home.php\">Here</A> to return to our 
homepage."; 
  } 
} 

if ($headers == 0) { 
echo "<HTML><HEAD><TITLE>Login Page</TITLE></HEAD><BODY>"; 
} 

echo "<Form Action=\"login.php\" METHOD=POST>"; 
echo "<H2>User Name</H2>"; 
echo "<Input TYPE=\"text\" Name=\"UserID\" Value=",$UserID,">"; 
echo "<BR>"; 
echo "<H2>Password</H2>"; 
echo "<Input TYPE=\"password\" Name=\"Password\">"; 
echo "<BR>"; 
echo "<Input Type=\"submit\" Value=\"Submit\">"; 
echo "<Input Type=\"hidden\" Name=\"redirect\" Value=\"$redirect\">"; 
echo "</FORM>"; 
?> 
<A HREF=new.php>Create an Account</A> 
</BODY> 
</HTML> 



<?php 
//Header for Authenticator with Cookies: 
//I received some e-mail asking what code should be placed on other pages of the website using my Authenticator 
//with Cookies and Redirect. This  should appear before the HTML Tag on any page you want protected. 

//Put in your own info for username, password, DB, email@address, Cookiename,   
//the name of this page (currently thispage.php), and the name of the login page (currently 
login.php). 
//Cookiename MUST be the same as Cookiename in the login page. 

$dblink = mysql_pconnect("localhost","username","password"); 
mysql_select_db("DB"); 
   
if( !(isset( $CookieName ))) 
{   
        header("Location: http://www.yourdomain.com/login.php3?redirect=thispage.php"); 
        exit; 
}   
   
$sidarray = explode("+","$CookieName"); 
   
$query = "select * from members where UserID = \"$sidarray[0]\" and sid = \"$sidarray[1]\""; 
   
if ( !($dbq = mysql_query( $query, $dblink))) { 
  echo "Unable to find database.  Please Contact <A 
HREF=\"mailto:email@address\">email@address</a>.\n"; 
  exit; 
} 
   
if (mysql_num_rows( $dbq ) != 1) { 
        header("Location: http://www.yourdomain.com/login.php3?redirect=thispage.php"); 
        exit; 
}   
    
?>
