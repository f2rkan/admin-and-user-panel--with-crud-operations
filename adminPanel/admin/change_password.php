<?php
	$msg="";
	include("../include/settings.php");
	include("../admin/check_session.php");
	$User_Id=$_SESSION["userId"];
	if(isset($_POST["btnUpdate"]))
	{

		if(($_POST["txtUserName"]!=null) && ($_POST["txtPassword"]!=null) && ($_POST["txtNewPassword"]!=null) && ($_POST["txtConfirmPassword"]!=null))
		{
			$sql=$mysqli->prepare("select Password from usermaster where User_Name=?");
			$sql->bind_param("s",$_SESSION["userName"]);
			$sql->execute();
			$sql->bind_result($Password);
			if($sql->fetch()>0 && $_POST["txtPassword"]== $Password)
			{
				if($_POST["txtNewPassword"]== $_POST["txtConfirmPassword"])
					{					
						$sql->close();
						$sql=$mysqli->prepare("update usermaster set Password=?  where User_Id=?");
						$sql->bind_param("si",$_POST["txtNewPassword"],$User_Id);
						$sql->execute();
						$sql->close();
						
						$msg= "Güncelleme işlemi başarıyla gerçekleştirildi.";
					}
					else
					{
						$msg= "Şifreler uyumsuz.";
					}
				}
			else
			{
				$msg= "Kullanıcı adı veya şifre hatalı.";
			}
		}
		else
		{
			$msg= "Boş alan tespit edildi.";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Şifreyi Değiştir</title>
</head>
<body>
<table align="center">
	<tr>
    	<td>
            <fieldset>
           		 <legend align="center">Şifreyi Değiştir</legend>
                	<form action="" method="post">
                        <table align="center">
                        <tr>
                              <td colspan="2" align="center">
                                    <font size="+2" color="#FF0000">
											<?php 
                                                echo $msg; 
                                            ?>
                                    </font>
                              </td>
               			 </tr>
                         <tr>
                                <td>
                                    Kullanıcı Adı:
                                </td>
                                <td>
                                    <input type="text" name="txtUserName" readonly value="<?php echo $_SESSION["userName"]?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Eski Şifre:
                                </td>
                                <td>
                                    <input type="password" name="txtPassword" required title="Eski Şifreni Gir"/>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    Yeni Şifre:
                                </td>
                                <td>
                                    <input type="password" name="txtNewPassword" required title="Yeni Şifreni Gir"/>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    Yeni Şifre Tekrar:
                                </td>
                                <td>
                                    <input type="password" name="txtConfirmPassword" required title="Tekrar Yeni Şifre"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="Update" name="btnUpdate" /> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; 
                                    <input type="button" value="Cancel" name="btnCancel" onClick="window.location.replace('manage_profile.php')" />		
                                    
                          
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
