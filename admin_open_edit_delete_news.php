
<div class="row" id="edit_Events">
	<div class="col-lg-12 mb-4">
		<div class="card h-100" >
			<h3 class="card-header" class="linkd">Edit And Delete Events</h3>
      <div class="card-body">
 				<div class="row">
  					<div class="col-lg-12 mb-12">  					  
      					<div class="row">     
        					<div class="col-sm-1">
          						<div class="col-sm-12">
            						<div class="form-group">
             							 <label><center>ID</center></label>
            						</div>
          						</div>
        					</div>
        				<div class="col-sm-2">
          					<div class="col-sm-12">
            					<div class="form-group">
              						<label>Date</label>
            					</div>
          					</div>
        				</div>
        				<div class="col-sm-7">
          					<div class="col-sm-12">
            					<div class="form-group">
              						<label>Heading</label>
            					</div>
          					</div>
        				</div>
        				<div class="col-sm-2">
          					<div class="col-sm-12">
            					<div class="form-group">
              						<label>Option</label>
            					</div>
          					</div>
        				</div>
      				</div>
      				<hr>   

				<?php
		//TAKING VALUES//
					$sql="SELECT * FROM voluntary_event ORDER BY dates DESC LIMIT 20";
					$result=mysqli_query($dbconfig,$sql);
													//TAKING VALUES CLOSE//
					while($row=mysqli_fetch_assoc($result))
					{
						echo"<div class=\"row\">     
        						<div class=\"col-sm-1\">
          							<div class=\"col-sm-12\">
            							<div class=\"form-group\">
              								<label>$row[id]</label>
            							</div>
          							</div>
        						</div>
        					<div class=\"col-sm-2\">
          						<div class=\"col-sm-12\">
            						<div class=\"form-group\">
              							<label>$row[dates]</label>
            						</div>
          						</div>
        					</div>
        					<div class=\"col-sm-7\">
          						<div class=\"col-sm-12\">
            						<div class=\"form-group\">
              							<label>$row[headline]</label>
            						</div>
          						</div>
        					</div>
        					<div class=\"col-sm-2\">
          						<div class=\"col-sm-12\">
            						<div class=\"form-group\">
              							<a href='?id=2".$row['id']."' data-toggle='tooltip' data-placement='top' title='Edit'><span class='glyphicon glyphicon-pencil' style='margin-left:5px;'></span>Edit</a><a href='?id=3".$row['id']."' data-toggle='tooltip' onclick=\"return confirm('Are you sure to delete this event?')\" data-placement='top' title='Delete'><span style='margin-left:5px;' class='glyphicon glyphicon-trash'></span>Delete</a>
            						</div>
          						</div>
        					</div>
      					</div><hr>";    					
					}
				?>
			</div>
		</div>
	</div>
</div>
</div>
</div>
												<!--OPEN-->
<?php
	$c=1;
	$s=0;
	$a=0;
	if($_GET){
		error_reporting(0);
		$a=$_GET["id"];
		
    if($a != "")
		{
			$s=substr($a,0,1);
			$a=substr($a,1);
			$c=0;
		}
	
  }
	if($s==3)
	{
		$sql2="Delete FROM voluntary_event where id='$a'";
		$result2=mysqli_query($dbconfig,$sql2);
		if(!$result2)
			echo mysqli_error($dbconfig);
		else
			echo "<script>
					alert('Events Delated Successfully.');
					window.location.href='test.php';
				</script>";
	};
?>

<script>
	var i="<?php echo $c;?>";
	var s="<?php echo $s;?>";
</script>
</div>
</div>
</div>
</div>

<script type="text/javascript">
	function edit_Events(){
		document.getElementById("edit_Events").style.display="none";
		}
</script>
	
	<?php
		if($s == 2)
		{
			$sql="SELECT * FROM voluntary_event where id='$a'";
			$result=mysqli_query($dbconfig,$sql);
			$row=mysqli_fetch_assoc($result);
			echo"<div class=\"container\" ><div class=\"row\">
					<div class=\"col-lg-12 mb-4\">
						<div class=\"card h-100\" >
							<h3 class=\"card-header\">Edit Event $a</h3>
            	 <div class=\"card-body\">
 								<div class=\"row\">
  									<div class=\"col-lg-12 mb-12\">
    									<form method=\"POST\" id=\"form\">
      										<div class=\"row\">     
        										<div class=\"col-sm-12\">
          											<div class=\"col-sm-12\">
            											<div class=\"form-group\">
              												<label>Image File Name:</label>
              												<input type=\"text\" name=\"image_name2\" value='".$row['image_name']."' class=\"form-control\" required>
            											</div>
          											</div>
        										</div>
      										</div>
											<div class=\"row\">     
        										<div class=\"col-sm-12\">
      											    <div class=\"col-sm-12\">
            											<div class=\"form-group\">
              												<label>Headline:</label>
             												 <input type=\"text\" name=\"headline2\" value='".$row['headline']."' class=\"form-control\" required>
            											</div>
          											</div>
        										</div>
      										</div>
											<div class=\"row\">     
        										<div class=\"col-sm-12\">
          											<div class=\"col-sm-12\">
            											<div class=\"form-group\">
              												<label>Content:</label>
                                  		<textarea rows=\"5\" name=\"content2\"  class=\"form-control\" required>".stripcslashes($row['content'])."</textarea>
                                   	</div>
          											</div>
        										</div>
     										 </div>
											<div class=\"row\">     
        										<div class=\"col-sm-12\">
          											<div class=\"col-sm-12\">
            											<div class=\"form-group\">
              												<label>Date:</label>
                                  		<input type=\"date\" name=\"date2\" value='".$row['dates']."' class=\"form-control\" required>
            											</div>
          											</div>
        										</div>
      										</div>
											<div class=\"row\" >
        										<div class=\"col-sm-12\" align=\"right\">
          											<button type=\"reset\" class=\"btn\" style=\"background-color: \">Reset <span class=\"glyphicon glyphicon-repeat\"></span></button>
          											<button type=\"submit\" name=\"edit_submit\" class=\"btn btn-success\" style=\"background-color: #d6351e;color: white\">Continue <span class=\"glyphicon glyphicon-chevron-right\"></span></button>
        										</div>
      										</div>
    									</form>         
  									</div>
								</div>
							</div>
						</div>
					</div>
			</div></div>";
	echo "<script>window.location.href='#edit_Events'</script>";
	}
?>
	<script type="text/javascript">
		function function_reset()
		{
			document.getElementById("content").value="";
			document.getElementById("headline_").value="";
			document.getElementById("image_name").value="";
		}
	</script>
							<!--EDIT CLOSE-->
<?php
if(isset($_POST['edit_submit']))
{
	$image_name=$_POST["image_name2"];
	$headline=$_POST["headline2"];
	$content=$_POST["content2"];
	$date=$_POST["date2"];
	$sql="UPDATE voluntary_event set dates='$date',image_name='$image_name',headline='$headline',content='$content' WHERE id='$a'";
	echo"$sql";
	if(!mysqli_query($dbconfig,$sql))
		echo mysqli_error($dbconfig);
	else
		echo "<script>
					alert('Events Updated Successfully.');
					window.location.href='test.php';
				</script>";
}

?>
