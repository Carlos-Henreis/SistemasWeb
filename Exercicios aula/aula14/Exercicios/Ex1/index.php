
<?php
   $people = array( 
   "Abraham Lincoln", "Martin Luther King", "Jimi Hendrix", 
   "John Wayne", "John Carpenter", "Elizabeth Shue", "Benny Hill", 
    "Lou Costello", "Bud Abbott", "Albert Einstein", "Rich Hall", 
    "Anthony Soprano", "Michelle Rodriguez", "Carmen Miranda", 
    "Sandra Bullock", "Moe Howard", "Ulysses S. Grant", "Stephen Fry", 
    "Kurt Vonnegut", "Yosemite Sam", "Ed Norton", "George Armstrong Custer", 
    "Alice Kramden", "Evangeline Lilly", "Harlan Ellison"
    );
   
   $query = $_GET['query'];   
   $temp = array();
   
   while (list($k,$v) = each ($people)){
        if (stristr ($v, $query)){
            array_push($temp, $v);
        } 
    }
   $data = array("query" => $query, "result" => $temp);
   echo (json_encode($data));
?>
<!DOCTYPE html>
<html>
<head>
    <title>jQuery Demonstration</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script>
	 $(document).ready(function(){
	 var url = "names.php";

	 function getJSONAndList(value){
	 $.getJSON(url,{"query" : value}).done(
	function( data ) {
	 console.log("getJSON:",data);
	 setList(data);
	 });
	 }


	 // Preenche a lista de Nomes
	 function setList(obj){
	 var result = obj.result;
	 var list = $("#list");
	 list.empty(); // limpando a lista

	 for (var i = 0; i < result.length ; i++) {
	 var li = $("<li>"+ result[i] +"</li>");
	 list.append(li);
	 }
	 }

	 $("#searchstring").keyup(function(){
	 getJSONAndList(this.value)
	 })
	 });
	</script>
    
</head>
<body>
<h1>jQuery Live Search</h1>

<p>
    Search for: <input type="text" id="searchstring"/>
</p>

<div id="results">
    <ul id="list">
        <li>Results will be displayed here.</li>
    </ul>
</div>

</body>
</html>
