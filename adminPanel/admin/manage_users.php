<?php
	$msg="";
	include("../include/settings.php");
	include("check_session.php");
	if(isset($_POST["btnSearch"]))
	{
		$text=$_POST["txtSearch"];
		$sql=$mysqli->prepare("select usermaster.User_Id,userdetails.Name,usermaster.User_Type,userdetails.Email_Id,userdetails.Phone from usermaster inner join userdetails on usermaster.user_id=userdetails.user_id where Name like ?");
		$text='%'.$text.'%';
		$sql->bind_param("s",$text);
	}
	else
	{	
		$sql=$mysqli->prepare("select usermaster.User_Id,userdetails.Name,usermaster.User_Type,userdetails.Email_Id,userdetails.Phone from usermaster inner join userdetails on usermaster.user_id=userdetails.user_id");
		$sql->execute();
		$result=$sql->get_result();
	}
	$sql->execute();
	$result=$sql->get_result();
	
?>
<!DOCTYPE html>
<html>
<head>
<title>Kullanıcı Yönetimi</title>
</head>
<body>
<br><br><br><br>
    	<table border="1" cellspacing="0" cellpadding="10" align="center">
        	<tr>
            	<td align="center" style="font-size:40px;color:red">
                	Kullanıcı Yönetimi
                </td>
            </tr>
            <tr>
            	<td align="right">
                	<table cellspacing="0" cellpadding="0">
                    	<tr>
                        	
                            <td>
                            	 <a href="logout.php" name="lnkLogout">Çıkış Yap</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
            	<td>
                	<form method="post" action="">
                	<table cellpadding="10" cellspacing="0">
                    	<tr>
                        	<td width="100">
                            	<input type="button" onClick="window.location.replace('add_new_user.php')"  value="Yeni Kullanıcı Ekle"/>
                            </td>
                            <td width="350">
                            	<input type="button" onClick="window.location.replace('view_pics.php')"  value="Resimleri Görüntüle"/>
                            </td>
                            
                            <td>
                            	ARA: <input type="text" name="txtSearch" placeholder="Kullanıcı Ara"/> <input type="submit" value="ARA"  name="btnSearch"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                </td>
            </tr>
            <td>
            	<table border="1" align="center" cellpadding="15" cellspacing="0">
                    <tr>
                        <td>
                            Kullanıcı ID
                        </td>
                        <td>
                            Kullanıcı Adı
                        </td>
                        <td>
                            Kullanıcı Türü
                        </td>
                        <td>
                            E-mail
                        </td>
                        <td>
                            Telefon
                        </td>
                        <td>
                            Seçenek
                        </td>
                    </tr>
     		 <?php
	                while($row=$result->fetch_object())
					{
				?>
                    <tr>
                    	<td align="center">
                        	<?php echo $row->User_Id ?> 
                        </td>
                        <td>
                        	<?php echo $row->Name ?>
                        </td>
                        <td>
                        	<?php echo $row->User_Type ?>
                        </td>
                        <td>
                        	<?php echo $row->Email_Id ?>
                        </td>
                        <td>
                        	<?php echo $row->Phone ?> 
                        </td>
                        <td>
                        	<a href="edit_user.php?id=<?php echo $row->User_Id ?>"  title="Kullanıcı Düzenle" name="lnkEditProfile">Düzenle</a>		<!--query string-->
                        </td>
                    <?php
							}
    					?>
                    </tr>
                </table>
            </td>
        </table>     
    </form>	

</body>
</html>