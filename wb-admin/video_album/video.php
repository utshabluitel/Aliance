<?php
class Video
{
	//Add function
	Public function add($parent_id,$name,$is_active,$description)
	{
		//refer connection clean
		global $Conn;
		//clean function parameters
		$parent_id= $Conn->clean($parent_id);
		$name= $Conn->clean($name);
		$is_active= $Conn->clean($is_active);
		$description=$Conn->clean($description);
		//prepare sql
		$sql = "INSERT INTO video(parent_id,name,is_active,description) VALUES($parent_id,'$name','$is_active','$description')";
		//execute query & store result
		$result=$Conn->execute($sql);
		//return result
		return $result;	
	}
	
	//Update function
	Public function update($id,$name,$parent_id,$is_active,$description)
	{
		global $Conn;
		$id= $Conn->clean($id);
		$parent_id= $Conn->clean($parent_id);
		$name= $Conn->clean($name);
		$is_active= $Conn->clean($is_active);
		$description= $Conn->clean($description);
		
		$sql = "UPDATE video SET
									parent_id=$parent_id,
									name='$name',
									is_active='$is_active',
									description='$description'
								WHERE
									id=$id";	
		$result = $Conn->execute($sql);
		return $result;
	}
	
	//Delete function
	Public function delete($id)
	{
		global $Conn;
		$id= $Conn->clean($id);
		
		$sql = "DELETE FROM video WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	//getById function
	Public function getById($id)
	{
		global $Conn;	
	
		$id= $Conn->clean($id);
	
		$sql = "SELECT * FROM video WHERE id=$id";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	
	//GetAll Value function
	Public function getAll()
	{
		global $Conn;
		$sql = "SELECT * FROM video ORDER By id DESC";
		$result = $Conn->execute($sql);
		return $result;	
	}
	
	Public function getNameById($id)
	{
		global $Conn;	
		$id= $Conn->clean($id);
		$sql = "SELECT name FROM video WHERE id=$id";
		$result = $Conn->execute($sql);
		$row = $Conn->fetchArray($result);
		return $row['name'];	
	}
	
	Public function listParent()
	{
		global $Conn;
		$sql = "SELECT id, name FROM video WHERE parent_id=0";
		$result = $Conn->execute($sql);	
		return $result;
	}	
	
}
$Video = new Video;
?>

