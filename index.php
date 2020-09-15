<!--Inlcuding php for MySql connectivity-->
<?php
      //
      require_once 'includes\connection.php';
      if($_SERVER["REQUEST_METHOD"]=="POST"){

        $prep = $db->prepare ("INSERT INTO formtable (entry_id,firstname,middlename,lastname,email,country,rating,comments) VALUES ('0',?,?,?,?,?,?,?)");
        
        $prep->bind_param("sssssss",$firstname,$middlename,$lastname,$email,$country,$rating,$comments);
        
        $firstname =$_POST["fname"];
        $middlename=$_POST["mname"];
        $lastname=$_POST["lname"];
        $email=$_POST["email"];
        $country=$_POST["country"];

        if(isset($_POST["rating1"])){
          $rating=$_POST["rating1"];
        }
        elseif(isset($_POST["rating2"])){
          $rating=$_POST["rating2"];
        }
        elseif(isset($_POST["rating3"])){
          $rating=$_POST["rating3"];
        }
        elseif(isset($_POST["rating4"])){
          $rating=$_POST["rating4"];
        }
        else{
          $rating=$_POST["rating5"];
        }
        

      }

      $prep->execute();
      $result = $db->insert_id;
      $prep->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>MyFooBlog Sanskar</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body id="Body">

<header>
  <h2 align="Center">My blog (<a href="https://www.instagram.com/oshnomnomnom/">oshnomnomnom</a> )<h1>by Oshi Chopra & Sanskar Sharma</h1><h1>created by Sanskar Sharma (0120180381)</h1></h2>

</header>


<div id="Mydiv">
<section>
  
  <nav>
    <h4><span style="color: white;">Food Gallery</span></h4>
    <ol>
      <li><a href="SHEERKHURMA.html">SHEER KHURMA!✨</a></li>
      <li><a href="Pasta&Mac WCP.html" >Pasta&Mac series: WHITE CHEESE PASTA🧀</a></li>
      <li><a href="CHOCO VANILLA CAKE.html">CHOCO VANILLA CAKE!💖</a></li>
      <li><a href="AMRITSARI CHOLE KULCHE!✨💓🥰.html">AMRITSARI CHOLE KULCHE!✨💓🥰</a></li>
      <li><a href="RED SAUCE PASTA❤️.html">RED SAUCE PASTA❤️</a></li>
      <li><a href="VANILLA CHOCOLATE CAKE!💖🤩🥳.html">VANILLA CHOCOLATE CAKE!💖🤩🥳</a></li>
      
      
    </ol>
  </nav>
  
  <article>
    <img class="circular--square" align="center" src="images\website3.jpg" />
    <h3>Oshi Chopra</h3>
    <p>Hello world,<br>
      I'm a girl who lives to eat not eat to be alive. Food has always been my precious. In fact, food is everybody's first priority, so is mine. It really makes your mood good and takes same time as you take to finish a plate. Even if you are going through any ups and downs in life, food has a special place and the love for food always remain strong. This bond is beyond anything. And it is the real "forever and always". </p>
    <p>My love for food made me think "Why not share with the rest of the world wholesome healthy foods and ways to be happy and healthy that will keep even the most snobby foodie asking for more?" Well my answer was here, in this blog. So here you will be able to find loads of fun including healthy recipes to tantalize your taste buds or treat your family.</p>
    <p>Any type of commenting and interaction from you guys is greatly encouraged (even if you disagree with me! and If you do let me know why who knows we might both learn something new) If there is anything you ever want to talk about, or say anything at all, please email me at:
    <a href="mailto:oshichopra258@gmail.com">oshichopra258@gmail.com</a> because I would absolutely love to hear from you guys.<br><br>
      Looking forward to your support! Thankyou!<br>
      Have a great day!</p>
  </article>
  <article2>
    <img class="circular--square" align="center" src="images\website1.jpg" />  
    <h3>Sanskar Sharma</h3>
    <p>Hello world,<br>
      I'm an (special) ordinary boy who loves food the most. Food the most favorite part of everything. This site represents a complex interweaving of  "foodie", interest in cooking, writing about them, and photography. Here, you'll find all kinds of vegetarian dishes and some description about them. I am a type of person who is interested in cooking, clicking pictures and finally eating the food made by myself. I resist myself from sharing my food with anyone but sometimes it seems okay to share love. Many things will come and go, but only food remains your constant. <br><br>
      So, love food, eat healthy and junk as well, eat proper meal. I am really excited to share all my best food and their recipes here. I hope you guys will show some interest or else I know how to be a attention seeker. Get ready for a drooling food ride. It is gonna be a long long journey. All we need is your support. Let the food reach out to everybody. The whole world! <br><br>
      So, be ready to have some fun and be sure to get yourself into this scene! I greatly encourage comments and questions on here. You can email me at 
      <a href="mailto:zulu1999vidhu@gmail.com">zulu1999vidhu@gmail.com</a>.
      Furthermore to know me and my more hobbies and share your food or blogging stories follow my Instagram handle: <a href="https://www.instagram.com/sansskarsharma/">sansskarsharma</a><br><br>
      I'm really looking forward to your love and support guys! Thank you!
    </p>
    
  </article2>

</section>
</div>
<div id="Mydiv2"  style="display: none;">
  <h3 align="center">Feedback Form</h3>

  <div class="container">
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="myForm" enctype="multipart/form-data">
      <label for="fname">First Name<span style="color: red;">*</span></label>
      <input type="text" id="fname" name="firstname" placeholder="Your name.." required>
      
      <label for="lname">Middle Name</label>
      <input type="text" id="mname" name="middlename" placeholder="Your middle name..">
  
      <label for="lname">Last Name<span style="color: red;">*</span></label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>
  
      <label for="email">Email Address<span style="color: red;">*</span></label>
      <input type="email" id="email" name="email" placeholder="Your email address.." required>
  
      <label for="country">Country</label>
      <select id="country" name="country">
        <option value="India">India</option>
        <option value="USA">USA</option>
        <option value="Russia">Russia</option>
      </select>
      <label for="userrating">Rate our blog</label>
      <form class="rating" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post"enctype="multipart/form-data" id="myForm" required >
          
            <input type="radio" id="rating1"name="stars" value="1" onclick="checked">
            <span class="icon">★</span>
          
            <input type="radio" id="rating2"name="stars" value="2" onclick="checked">
            <span class="icon">★</span>
            <span class="icon">★</span>
          
            <input type="radio" id="rating3"name="stars" value="3" onclick="checked">
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>   
          
            <input type="radio" id="rating4"name="stars" value="4" onclick="checked">
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          
            <input type="radio"id="rating5" name="stars" value="5" onclick="checked" >
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
    
      </form>
      <br>
      <label for="comments">Comments</label>
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
      <p style="font-size: 15px;">(NOTE: fields with <span style="color: red;">*</span> are mandatory.)</p>
      <input type="submit" name="execute" id="execute"value="Submit" onclick="submit()">
      <input type="button" value="Close" onclick="restore()">
      <input type="button" value="Details" onclick="showdetails()">
      
      


    </form>
    
   <!--end of container division--> 
  </div> 
  <!--end of feedback form division-->
</div>
<div id="Feedbackdata" style="display: none;">
  <br>
  <h7>Feedbacks</h7><br>
  <p1>We value your concerns</p1>
  <br><br>
  <table class="feeddata">
    <tr>
      <th>S. no</th>
      <th>First name</th>
      <th>Middle name</th>
      <th>Last name</th>
      <th>E-mail</th>
      <th>Country</th>
      <th>User-Rating</th>
      <th>Feedback</th>
    </tr>
    
      <tbody id="tbody"></tbody>
    
 </table>
 <br>

 <?php 
 if (isset($_POST['execute'])){
   echo $result ;
   }  
 ?>

</div>
<footer class="f1">
  <table>
    <tr>
      <td style="text-align: left;"><b>Contact Us</b></td>
      <td style="text-align: left;text-align: center;"><b>About Us</b></td>
      <td style="text-align: left;"><b>Join Us</b></td>
    </tr>
    <tr>
      <td style="text-align: left;"><a href="mailto:sksharma@mitaoe.ac.in">Email us</a></td>
      <td rowspan="2"> <span class="about">We are a pair of two food enthusiasts who loves to cook and more importantly with will to try the ample of food varieties out there. We believe that food has an undeniable linkage with the geographies, so we look forward to travelling places and discover their living and especially the food they live by and live for. We are looking for such enthusiasts and will encourage any kind of collaborations they can offer. We believe in a never ending and an underestimated love for food, which is true in all possible realms of life. 
        <br><b>"Divided we'll fall but together we can spread the food love to this beautiful world."</b></span></td>
      <td class="joinus"style="text-align: left;"><button class="fdback"  onclick="Dispmode()">Feedback</button></td>
    </tr>
    <tr>
      <td style="text-align: left;"><a href="tel:6261614589">Call us</a></td>
      <td class="joinus"style="text-align: left;"><a href="https://www.instagram.com/oshnomnomnom/">Instagram</a></td>
    </tr>
    <tr>
      <td style="text-align: left;"><a href="https://www.youtube.com/watch?v=wq-Q7CDj6ZI" target="_blank">Help</a></td>
      <td style="color:rgb(37, 34, 34);">@ 2020 Copyright <a href="index.html">MyFoodBlog</a></td>
      <td class="joinus"style="text-align: left;"><a href="https://twitter.com/_imsanskar_" >Twitter</a></td>
    </tr>
  </table> 
</footer>

<script>
  var x = 0;
      var array = Array();
      var i=0;
      
      function submit() {
        /*Put all the data posting code here*/
          var f=document.getElementById("fname");
          var l=document.getElementById("lname");
          var e=document.getElementById("email");
          if(f.checkValidity() && l.checkValidity() && e.checkValidity()){
            var Rowentry={};
            Rowentry["S.No"] = x+1;
            Rowentry["First name"]= document.getElementById("fname").value;
            Rowentry["Middle name"]= document.getElementById("mname").value;
            Rowentry["Last name"]= document.getElementById("lname").value;
            Rowentry["E-mail"]= document.getElementById("email").value;
            Rowentry["Country"]= document.getElementById("country").value;
            //if (document.getElementById('rating').checked) {
            //  Rowentry["User-Rating"] = document.getElementById('rating1').value;
            //}
            //else{
            //  Rowentry["User-Rating"]="5";
            //}
            if(document.getElementById('rating1').checked)
            {
              Rowentry["User-Rating"] = document.getElementById('rating1').value;
            }
            else if(document.getElementById('rating2').checked)
            {
              Rowentry["User-Rating"] = document.getElementById('rating2').value;
            }
            else if(document.getElementById('rating3').checked)
            {
              Rowentry["User-Rating"] = document.getElementById('rating3').value;
            }
            else if(document.getElementById('rating4').checked)
            {
              Rowentry["User-Rating"] = document.getElementById('rating4').value;
            }
            else{
              Rowentry["User-Rating"] = document.getElementById('rating5').value;
            }
            Rowentry["Feedback"]= document.getElementById("subject").value;
            //alert("Element: " + array[x] + " Added at index " + x);
            x++;
            //document.getElementById("text1").value = "";
            array.push(Rowentry);
            delete Rowentry;
          }else{
            if(!e.checkValidity() && f.checkValidity() && l.checkValidity()){
              alert("Enter valid email address!");
            }
            else{
              alert("Fields with * are mandatory!Try agin.");
            }
            
          }
          document.getElementById("myForm").reset();
          document.getElementById("subject").value = "";
      }
      
      function showdetails(){
       document.getElementById("Body").style.alignContent="center"; 
     document.getElementById("Mydiv2").style.display = "none";
     document.getElementById("Feedbackdata").style.display = "inline-block";
     document.getElementById("Mydiv").style.display = "none";
     
     var tbody = document.getElementById('tbody');
    //for (var i = 0; i < array.length; i++) {
      
      var tr = "<tr>";

       /* Verification to add the last decimal 0 */
       /*if (obj[i].value.toString().substring(obj[i].value.toString().indexOf('.'), obj[i].value.toString().length) < 2) 
       obj[i].value += "0";*/
      
       /* Must not forget the $ sign */
       tr += "<td>" + array[i]["S.No"] + "</td>" 
       + "<td>" + array[i]["First name"].toString() + "</td>"
       + "<td>" + array[i]["Middle name"].toString() + "</td>"
       + "<td>" + array[i]["Last name"].toString() + "</td>"
       + "<td>" + array[i]["E-mail"].toString() + "</td>"
       + "<td>" + array[i]["Country"].toString() + "</td>"
       + "<td>" + array[i]["User-Rating"].toString() + "</td>"
       + "<td>" + array[i]["Feedback"].toString() + "</td>"
       "</tr>";
       ++i;
       /* We add the table row to the table body */
       tbody.innerHTML += tr;
     // }
    }

  function Dispmode(){
    
    document.getElementById("Mydiv").style.display = "none";
    document.getElementById("Mydiv2").style.display = "inline-block";
    document.getElementById("Feedbackdata").style.display = "none";
    
    
  }
  function restore(){
    
    document.getElementById("Mydiv").style.display = "inline-block";
    document.getElementById("Mydiv2").style.display = "none";
    document.getElementById("Feedbackdata").style.display = "none";
    
  }
  
</script>

</body>
</html>