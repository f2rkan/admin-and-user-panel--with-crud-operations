<?php
	$msg="";
	include("../include/settings.php");
	include("check_session.php");
	if(isset($_POST["btnUpdate"]))
	{
		if(($_POST["txtUsername"]!=null)&& ($_POST["txtPassword"]!=null)&& ($_POST["txtConfirmPassword"]!=null)&& ($_POST["txtName"]!=null)&& ($_POST["txtAddress"]!=null)&& ($_POST["txtCity"]!=null)&& ($_POST["txtState"]!=null)&& ($_POST["txtCountry"]!=null)&& ($_POST["txtPhone"]!=null)&& ($_POST["txtEmailId"]!=null))
		{
			if($_POST["txtPassword"]==$_POST["txtConfirmPassword"])
			{
				
				$sql1=$mysqli->prepare("update usermaster set Password=?  where user_id=?");
				$sql1->bind_param("si",$_POST["txtPassword"],$_SESSION["userId"]);
				$sql1->execute();
				$sql1->close();
								
				$sql2=$mysqli->prepare("update userdetails set Name=? , Address=? , City=? , State=? , Country=? , Phone=? , Email_id=?  where user_id=?");
				$sql2->bind_param("sssssssi",$_POST["txtName"],$_POST["txtAddress"],$_POST["txtCity"],$_POST["txtState"],$_POST["txtCountry"],$_POST["txtPhone"],$_POST["txtEmailId"],$_SESSION["userId"]);
				$sql2->execute();
				$sql2->close();
				
				$msg="Kayıt Güncellendi";
			}
			else
			{
				$msg= "Şifreler Eşleşmedi";
			}
		}
		else
		{
			$msg= "Tüm alanları doldur.";
		}
	}
	$sql="select * from usermaster inner join userdetails on usermaster.user_id=userdetails.user_id where usermaster.User_Id=".'"'.$_SESSION["userId"].'"';
	$result=mysqli_query($mysqli,$sql);
	while($row=mysqli_fetch_object($result))
	{
?>
<!DOCTYPE html>
<html>
<head>
<title>Profil Yönetimi</title>
</head>
<body>
<form action="" method="post">
	<table cellpadding="10" cellspacing="0" border="1" align="center">
    	<tr>
        	<td align="center" style="font-size:30px;color:red">
            	Benim Profilim
            </td>
        </tr>
        <tr>
        	<td align="center">
            <table cellpadding="0" cellspacing="10">
            	<tr>
                	<td>
                    	<a href="manage_users.php" name="lnkManageUsers" >Kullanıcı Yönetimi</a>
                    </td>
                    <td>
                    	<a href="change_password.php" name="lnkChangePassword" >Şifre Değiştir</a>
                    </td>
                    <td>
                    	 <a href="logout.php" name="lnkLogout">Çıkış Yap</a>
                    </td>
                </tr>
                <tr>
                      <td colspan="2" align="center">
                      	<font size="+2" color="#FF0000">
							<?php 
								echo $msg; 
							?>
                        </font>
                      </td>
                </tr>
             </table>             
            </td>
        </tr>
        <tr>
        	<td>
            	<fieldset>
                	<legend align="center"> Hesap Bilgileri</legend>
                 <table cellspacing="0">
                 	<tr>
                    	<td width="120">
                        	Kullanıcı Adı:
                        </td>
                        <td>
                        	<input type="text" name="txtUsername" required title="Kullanıcı Adı" readonly  value="<?php echo $row->User_Name ?>"/> 
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Şifre:
                        </td>
                        <td>
                        	<input type="password" name="txtPassword" required title="Şifre" value="<?php echo $row->Password ?>"/>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Tekrar Şifre:
                        </td>
                        <td>
                        	<input type="password" name="txtConfirmPassword" required title="Tekrar Şifre" value="<?php echo $row->Password ?>"/>
                        </td>
                    </tr>
                 </table>   
                </fieldset>
                
                <fieldset>
                	<legend align="center"> Kişisel Bilgiler </legend>
                 <table cellspacing="0">
                 	<tr>
                    	<td width="120">
                        	İsim:
                        </td>
                        <td>
                        	<input type="text" required name="txtName" title="isim" value="<?php echo $row->Name ?>" />
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Adres:
                        </td>
                        <td>
                       		<textarea rows="4" cols="16" name="txtAddress" required title="Adres"><?php echo $row->Address ?></textarea> 	
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Şehir:
                        </td>
                        <td>
                        	<input type="text" name="txtCity" required title="Şehir" value="<?php echo $row->City ?>"/>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Bölge:
                        </td>
                        <td>
                        	<input type="text" name="txtState" required title="Bölge" value="<?php echo $row->State ?>"/>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Ülke:
                        </td>
                        <td>
                        	<input type="text" name="txtCountry" required title="Ülke" value="<?php echo $row->Country ?>"/>
                        </td>
                    </tr>
                     <tr>
                    	<td>
                        	Telefon:
                        </td>
                        <td>
                        	<input type="text" name="txtPhone" required title="Telefon" value="<?php echo $row->Phone ?>"/>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	E-mail:
                        </td>
                        <td>
                        	<input type="text" name="txtEmailId" required title="e-mail" value="<?php echo $row->Email_Id ?>"/>
                        </td>
                    </tr>
                     <tr>
                    	<td  align="center" colspan="2">
                        	<input type="submit" value="Update" name="btnUpdate"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="reset" value="Reset" name="btnReset"/>
                        </td>
                    </tr>
                </table>   
                </fieldset>
            </td> 
        </tr>
    </table>
    <?php
	}
    ?>
    </form>
</body>
</html>