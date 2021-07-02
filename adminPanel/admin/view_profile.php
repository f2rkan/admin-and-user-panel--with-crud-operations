<?php
	$msg="";
	include("../include/settings.php");
	include("check_session.php");
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
            	Profile Ekranı
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
                        	<?php echo $row->User_Name ?>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Şifre:
                        </td>
                        <td>
                        	<?php echo $row->Password ?>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Tekrar Şifre:
                        </td>
                        <td>
                        <?php echo $row->Password ?>
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
                        	<?php echo $row->Name ?>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Adres:
                        </td>
                        <td>
                       	<?php echo $row->Address ?> 	
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Şehir:
                        </td>
                        <td>
                        	<?php echo $row->City ?>
                       </td>
                    </tr>
                    <tr>
                    	<td>
                        	Bölge:
                        </td>
                        <td>
                        	<?php echo $row->State ?>
                        </td>
                    </tr>
                    <tr>
                    	<td>
                        	Ülke:
                        </td>
                        <td>
                        	<?php echo $row->Country ?>
                        </td>
                    </tr>
                     <tr>
                    	<td>
                        	Telefon:
                        </td>
                        <td>
                        	<?php echo $row->Phone ?>
                       </td>
                    </tr>
                    <tr>
                    	<td>
                        	E-mail:
                        </td>
                        <td>
                      	  <?php echo $row->Email_Id ?>
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