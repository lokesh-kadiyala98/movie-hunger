<?php
  $dbc = mysqli_connect("localhost", "root", "Jyothi123", "movie_hunger");
  $stat = 'lokesh';
  $total=0;
  $query = "CALL samp('".$stat."',".$total.")";
  $results = mysqli_query($dbc, $query);
  while($row = mysqli_fetch_array($results)){
    echo $total;
  }
  ?>
<html>
<body>

<a target="_blank" href="../" onclick="return myFun()">Click</a>

<script>
function myFun() {
    if(confirm("Press a button!"))
    	return true;
    else
    	return false;
}
</script>

</body>
</html>
