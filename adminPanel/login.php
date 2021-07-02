<?php
	include("include/settings.php");
	$msg="";
	if(isset($_POST["btnLogin"]))
	{
		if(trim($_POST["txtUserName"])!=null && trim($_POST["txtPassword"])!=null)
		{
			$sql=$mysqli->prepare("select * from usermaster where User_name=?");
			$sql->bind_param("s",$_POST["txtUserName"]);
			$sql->execute();
			$sql->bind_result($User_Id,$User_Name,$Password,$User_Type);
			if($sql->fetch()>0 &&  $_POST["txtPassword"]==$Password)
			{
				$_SESSION["userId"]=$User_Id;
				$_SESSION["userName"]=$User_Name;
				$_SESSION["userType"]=$User_Type;
				if(strToLower($User_Type)=="admin")
				{
					header("location:".baseurl()."admin/manage_users.php");
				}
				else
				{
					header("location:".baseurl()."employee/view_profile.php");
				}
			}
			else
			{
				$msg="Geçersiz Kullanıcı Adı ya da Şifre";
			}
		}
		else
		{
			$msg="Kullanıcı Adı ve Şifre Girişi Yap";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>GİRİŞ EKRANI</title>
</head>
<body>
	<table align="center">
	<tr>
    	<td>
            <fieldset>
           		 <legend align="center">GİRİŞ PANELİ</legend>
                	<form action="" method="post">
                        <table align="center">
                           	<tr>
                            	<td colspan="2" align="center">
                                	<font size="+2" color="#FF0000"><?php echo $msg; ?></font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Kullanıcı Adı:
                                </td>
                                <td>
                                    <input type="text" name="txtUserName" required title="kullanıcı adı"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Şifre:
                                </td>
                                <td>
                                    <input type="password" name="txtPassword" required title="şifre" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="GİRİŞ YAP" name="btnLogin">
                                </td>
                            </tr>	
							
                        </table>
                   </form>
            </fieldset>
		</td>
	</tr>
</table>	
</body>
</html>