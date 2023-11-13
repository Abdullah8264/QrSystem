<html>  
    <head>  
        <title>Welcome</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    </head>  
    <body> 
    <style>
		body {
			background-color:  #27363b;
		}
	</style> 
        <div class="container">  
            <br />  
            <br />
			<br />
			<div class="table-responsive  style=background-color: white;">  
            <h3 style="font-family: 'Times New Roman', Times, serif; font-weight: bold; color: white; text-align: center;">BATCH CREATION</h3>
            <br />
				<span id="result"></span>
				<div id="live_data"></div>                 
			</div>  
		</div>
    </body>  
</html>  
<script>  
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"select.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add', function(){  
        var Mixing_Phase        =   $('#Mixing_Phase').text();
        var Actions             =   $('#Actions').text();  
        var Material_name       =   $('#Material_name').text();
        var Material_Weight     =   $('#Material_Weight').text();  
        var Rotator_1	        =   $('#Rotator_1').text(); 
        var Rotator_2	        =   $('#Rotator_2').text(); 
        var Mixing_time	        =   $('#Mixing_time').text(); 
        var Pressure	        =   $('#Pressure').text(); 
        
        if(Mixing_Phase == '')  
        {  
            alert("Enter Mixing_Phase");  
            return false;  
        }  

        if(Actions == '')  
        {  
            alert("Enter Action");  
            return false;  
        }  
        if(Material_name == '')  
        {  
            alert("Enter Material Name");  
            return false;  
        }  
          
        if(Material_Weight == '')  
        {  
            alert("Enter Material Weight");  
            return false;  
        }  
        if(Rotator_1 == '')  
        {  
            alert("Enter Rotator 1");  
            return false;  
        }  
        if(Rotator_2 == '')  
        {  
            alert("Enter Rotator 2");  
            return false;  
        }  
        if(Mixing_time == '')  
        {  
            alert("Enter Mixing time");  
            return false;  
        }  
        if(Pressure == '')  
        {  
            alert("Enter Pressure");  
            return false;  
        }  
        
        $.ajax({  
            url:"insert.php",  
            method:"POST",  
            data:{Mixing_Phase:Mixing_Phase,Actions:Actions, Material_name:Material_name,Material_Weight:Material_Weight,Rotator_1:Rotator_1,Rotator_2:Rotator_2 ,Mixing_time:Mixing_time,Pressure:Pressure},  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(steps, text, column_name)  
    {  
        $.ajax({  
            url:"edit.php",  
            method:"POST",  
            data:{steps:steps, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                //alert(data);
				$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }
        $(document).on('blur', '.Mixing_Phase', function(){  
            var steps = $(this).data("steps0");  
            var Mixing_Phase = $(this).text();  
            edit_data(steps, Mixing_Phase, "Mixing_Phase");  
        });    


        $(document).on('blur', '.Actions', function(){  
            var steps = $(this).data("steps1");  
            var Actions = $(this).text();  
            edit_data(steps, Actions, "Actions");  
        });  
        $(document).on('blur', '.Material_name', function(){  
            var steps = $(this).data("steps2");  
            var Material_name = $(this).text();  
            edit_data(steps,Material_name, "Material_name"); 

        });  
        $(document).on('blur', '.Material_Weight', function(){  
            var steps = $(this).data("steps3");  
            var Material_Weight = $(this).text();  
            edit_data(steps,Material_Weight, "Material_Weight"); 
        });  
        
        $(document).on('blur', '.Rotator_1', function(){  
            var steps = $(this).data("steps4");  
            var Rotator_1 = $(this).text();  
            edit_data(steps,Rotator_1, "Rotator_1"); 
        });  

        $(document).on('blur', '.Rotator_2', function(){  
            var steps = $(this).data("steps5");  
            var Rotator_2 = $(this).text();  
            edit_data(steps,Rotator_2, "Rotator_2"); 
        });  
        $(document).on('blur', '.Mixing_time', function(){  
            var steps = $(this).data("steps6");  
            var Mixing_time = $(this).text();  
            edit_data(steps,Mixing_time, "Mixing_time"); 
        });  
        $(document).on('blur', '.Pressure', function(){  
            var steps = $(this).data("steps7");  
            var Pressure = $(this).text();  
            edit_data(steps,Pressure, "Pressure"); 
        }); 
        
    $(document).on('click', '.btn_delete', function(){  
            var steps=$(this).data("steps8");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{steps:steps},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>