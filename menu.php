
<!DOCTYPE html>
<html>
<head>
	<title>MENU</title>
</head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- <link  rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/fonts/fontawesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/fonts/fontawesome.css">
<link rel="stylesheet" type="text/css" href="../css/fonts/regular.css">
<link rel="stylesheet" type="text/css" href="../css/fonts/regular.min.css">
<link rel="stylesheet" type="text/css" href="../css/fonts/svg-with-js.min.css">
<link rel="stylesheet" type="text/css" href="../css/fonts/v4-shims.min.css">
<link rel="stylesheet" type="text/css" href="../css/nss.css">

<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<body  class="body no-gutter" style="background: url(./nsh/bg5.png);">


<!-- Navbar start -->
  

  <section class="container-fluid section-data navsection fixed-top">
    <nav class="navbar navbar-expand-lg navbar-transparent bg-transparent section-data fixed-top container-fluid">
          <div class="container-fluid section-data"> 
              <span class="text-center">
                <a href="../index.html"><img src="./nsh/mnimage/logo1.png" width="100" height="100" style="border-radius: 15%; border-color: red; border-style: ridge;"></a>
              </span>
              <span>
                 <div class="foodMenu dropdown">
                   <!-- <a class="btn btnMenu btn-outline-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      FOODS MENU
                    </a>

                    <div class="myDD dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="mydd dropdown-item btn-outline-success" href="#">EUROPEAN FOODS</a>
                      <div class="dropdown-divider"></div>
                      <a class="mydd dropdown-item" href="#">EASTERN FOODS</a>
                      <div class="dropdown-divider"></div>
                      <a class="mydd dropdown-item" href="#">WESTERN FOODS</a>
                      <div class="dropdown-divider"></div>
                      <a class="mydd dropdown-item" href="#">AFRICAN FOODS</a>
                      <div class="dropdown-divider"></div>
                      <a class="mydd dropdown-item" href="#">DESSERTS</a>
                </div>  -->
              </span>

                <span>

                    

                    <a class="btn btnMenu btn-outline-success " href="home.php">
                      HOME
                    </a>                    

                    <a class="btn btnMenu btn-outline-success " href="contact.php">
                      CONTACT
                    </a>

                    <a class="btn btnMenu btn-outline-success " href="about.php">
                      ABOUT US
                    </a>

                    <a class="btn btnMenu btn-outline-success " href="login.php">
                      LOG IN
                    </a>

                      <!-- <a href="register.php" style="text-decoration: none;" class="text-white">
                      <button class="btn btn-outline-warning text-white bg-transparent my-1" type="text" data-toggle="collapse" data-target="#MENU" aria-expanded="true" aria-controls="collapseExample">
                          <span class="text-center;">&ensp;&ensp;REGISTER&ensp;&ensp;</span>
                      </button></a>

                      <a href="login.php"style="text-decoration: none;" class="text-white">
                      <button class="btn btn-outline-warning bg-transparent my-1" type="button" data-toggle="collapse" data-target="#" aria-expanded="true" aria-controls="collapseExample">
                          <span class="text-center">&ensp;LOG IN&ensp;</span>
                      </button></a>

                      <a href="contact.php"style="text-decoration: none;" class="text-white">
                      <button class="btn btn-outline-warning bg-transparent my-1" type="button" data-toggle="collapse" data-target="#" aria-expanded="true" aria-controls="collapseExample">
                      <span class="text-center">&ensp;CONTACT&ensp;</span>
                      </button></a>

                      <a href="about.php"style="text-decoration: none;" class="text-white">
                      <button class="btn btn-outline-warning bg-transparent my-1" type="button" data-toggle="collapse" data-target="#" aria-expanded="true" aria-controls="collapseExample">
                          <span class="text-center">ABOUT US</span>
                      </button></a> -->
                  </span>
            </div>
      </nav>
   </section>

<!-- Navbar end -->


<section class="jumbotron jumbotron-fluid intro section-data mt-1 mb-0">
  <div class="row no-gutter">
    <div class="col-md-4 offset-md-2 my-5 py-5">    
        <h2 class="english text-warning">Welcome for Your Delicious <hr style="background: gold;"></h2>
      <p class="text-warning">

        Food is any substance consumed to provide nutritional support for an organism. Food is usually of plant, animal or fungal origin, and contains essential nutrients, such as carbohydrates, fats, proteins, vitamins, or minerals. The substance is ingested by an organism and assimilated by the organism's cells to provide energy, maintain life, or stimulate growth. Different species of animals have different feeding behaviours that satisfy the needs of their unique metabolisms, often evolved to fill a specific ecological niche within specific geographical contexts.<span id="dots">...</span><span id="more">

Omnivorous humans are highly adaptable and have adapted to obtain food in many different ecosystems. Historically, humans secured food through two main methods: hunting and gathering and agriculture. As agricultural technologies increased, humans settled into agriculture lifestyles with diets shaped by the agriculture opportunities in their geography. Geographic and cultural differences has led to creation of numerous cuisines and culinary arts, including a wide array of ingredients, herbs, spices, techniques, and dishes. As cultures have mixed through forces like international trade and globalization, ingredients have become more widely available beyond their geographic and cultural origins, creating a cosmopolitan exchange of different food traditions and practices.

Today, the majority of the food energy required by the ever-increasing population of the world is supplied by the industrial food industry, which produces food with intensive agriculture and distributes it through complex food processing and food distribution systems. This system of conventional agriculture relies heavily on fossil fuels, which means that the food and agricultural system is one of the major contributors to climate change, accountable for as much as 37% of total greenhouse gas emissions.Addressing the carbon intensity of the food system and food waste are important mitigation measures in the global response to climate change.</span></p>
      <button onclick="myFunction()" id="myBtn">Read less</button>
<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>

    </div>
    <div class="row no-gutter">
      <div class="col-md-4 offset-md-2 my-5 py-5">
        <a target="_blank" href="./nsh/Img1.jpg">
        <img class="image1" src="./nsh/Img1.jpg" height="550" width="450" class="py-1">
        </a>    
      </div>
    </div>
  </div>
</section>

<!-- Best deserts of our Restaurants srart -->
<section class="section-data container-fluid">
    <div class="container">
      <div class="row justify-content-center py-5">
      <h1 class="main-title text-center display-6 col-md-6 ">Weekly Most Popular Foods of our Restaurants <hr class="bg-dark"></h1>
      </div>
        <div class="row">
          <div class="col-md-6">
          <img class="my-1" src="./nsh/img1.jpg" height="550" width="450">      
        </div>
        <div class="col-md-6 pt-5">
          <div class="row">

            <div class="col-md-1">
            <span class="fa fa-book"></span>
            </div>
            <div class="col-md-11">
              <p class="english">This is a test paragraph only. When I finished this website, I'm gonna substitute real paragraph.Wah!.......</p>
            </div>

            <div class="col-md-1">
              <span class="fa fa-book"></span>
            </div>
            <div class="col-md-11">
            <p class="english">This is a test paragraph only. When I finished this website, I'm gonna substitute real paragraph.Wah!.......</p>
            </div>

            <div class="col-md-1">
              <span class="fa fa-book"></span>
            </div>
            <div class="col-md-11">
              <p class="english">This is a test paragraph only. When I finished this website, I'm gonna substitute real paragraph.Wah!.......</p>
            </div>

            <div class="col-md-1">
              <span class="fa fa-book"></span>
            </div>
            <div class="col-md-11">
              <p class="english">This is a test paragraph only. When I finished this website, I'm gonna substitute real paragraph.Wah!.......</p>
            </div>

            <div class="col-md-1">
              <span class="fa fa-book"></span>
            </div>
            <div class="col-md-11">
              <p class="english">This is a test paragraph only. When I finished this website, I'm gonna substitute real paragraph.Wah!.......</p>
            </div>

            <div class="col-md-1">
              <span class="fa fa-book"></span>
            </div>
            <div class="col-md-11">
              <p class="english ">This is a test paragraph only. When I finished this website, I'm gonna substitute real paragraph.Wah!.......</p>
            </div>
        </div>
      </div>
    </div>

    </div>
</section>

<!-- Best deserts of our Restaurants End -->

<section class="section-data container-fluid py-5">
  <div class="container">
    <div class="row justify-content-center">
      <h1 class="main-title text-center display-6 col-md-6 ">Weekly best Rating <span style="color: red;">Desserts</span> of Our Restaurant <hr class="bg-dark"></h1>
    </div>

      <div class="row py-4">
        <div class="col-md-4">
          <div class="card bg-dark border-red" style="width: 20rem; border-color: gold;">
            <img src="./images/falooda2.jpeg" class="card-img-top" alt="..." style="height: 300px;">
               <div class="card-block py-2">
                 <h5 class="card-title english text-white text-center py-2">Falooda <hr style="background:gold;"></h5>

                 <p class="text-center">
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>                   
                   <span class="fa fa-star text-white" aria-hidden="true"></span>
                 </p>
                 <p class="text-white english px-3">
                    <u>Main Ingredient</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-1"></span> Milk / Rose Syrup / Sweet Basil
                 </p>

                 <p class="text-white english px-3">
                    <u>Place of Origin</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-2"></span> INDIA 
                 </p>

                 <div class="text-center">

                   
                    <a class="btn btnMenu btn-outline-success english text-white text-white" href="login.php">
                      &ensp; Buy Now <i class='fas fa-shopping-cart' style='color:blue'></i> &ensp;
                    </a>
                 </div>

                </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card bg-dark border-red" style="width: 20rem; border-color: gold;">
            <img src="./images/Ice Cream.jpg" style="height: 300px;" class="card-img-top" alt="...">
               <div class="card-block py-2">
                 <h5 class="card-title english text-white text-center py-2">Ice Cream <hr style="background:gold;"></h5>

                 <p class="text-center">
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star-half text-white" aria-hidden="true"></span>
                 </p>
                 <p class="text-white english px-3">
                    <u>Main Ingredient</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-1"></span> Milk / Cream / Sweetener
                 </p>

                 <p class="text-white english px-3">
                    <u>Place of Origin</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-2"></span> CHINA
                 </p>

                 <div class="text-center">

                  
                    <a class="btn btnMenu btn-outline-success english text-white text-white" href="login.php">
                     &ensp; Buy Now <i class='fas fa-shopping-cart' style='color:blue'></i> &ensp;
                    </a>
                 </div>

                </div>
          </div>
        </div>


        <div class="col-md-4">
          <div class="card bg-dark border-red" style="width: 20rem; border-color: gold;">
            <img src="./images/Egg pudding.jpg" style="height: 300px;" class="card-img-top" alt="...">
               <div class="card-block py-2">
                 <h5 class="card-title english text-white text-center py-2">Egg Pudding <hr style="background:gold;"></h5>

                 <p class="text-center">
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                 </p>
                 <p class="text-white english px-3">
                    <u>Main Ingredient</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-1"></span> Eggs / Milk / Granulated Sugar
                 </p>

                 <p class="text-white english px-3">
                    <u>Place of Origin</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-2"></span> United Kingdom
                 </p>

                 <div class="text-center">

                    
                    <a class="btn btnMenu btn-outline-success english text-white text-white" href="login.php">
                      &ensp; Buy Now <i class='fas fa-shopping-cart' style='color:blue'></i> &ensp;
                    </a>
                 </div>

                </div>
          </div>
        </div>


      </div>
  
  </div>
</section>

<section class="section-data container-fluid py-5">
  <div class="container">
    <div class="row justify-content-center">
      <h1 class="main-title text-center display-6 col-md-6 ">Weekly best Rating <span style="color: red;"> Asian Food </span> of Our Restaurant <hr class="bg-dark"></h1>
    </div>

      <div class="row py-4">
        <div class="col-md-4">
          <div class="card bg-dark border-red" style="width: 20rem; border-color: gold;">
            <img src="./images/Kyay Oh.jpg" style="height: 300px;" class="card-img-top" alt="...">
               <div class="card-block py-2">
                 <h5 class="card-title english text-white text-center py-2">Kyay Oh <hr style="background:gold;"></h5>

                 <p class="text-center">
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white" aria-hidden="true"></span>
                 </p>
                 <p class="text-white english px-3">
                    <u>Main Ingredient</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-1"></span> Noodles / Meat Balls / Pork Broth
                 </p>

                 <p class="text-white english px-3">
                    <u>Place of Origin</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-2"></span> BURMA
                 </p>

                 <div class="text-center">

                    <a class="btn btnMenu btn-outline-success english text-white text-white" href="login.php">
                    &ensp; Buy Now <i class='fas fa-shopping-cart' style='color:blue'></i> &ensp;
                    </a>
                 </div>

                </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card bg-dark border-red" style="width: 20rem; border-color: gold;">
            <img src="./images/Ramen.jpg" style="height: 300px;" class="card-img-top" alt="...">
               <div class="card-block py-2">
                 <h5 class="card-title english text-white text-center py-2">Ramen <hr style="background:gold;"></h5>

                 <p class="text-center">
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star-half text-white" aria-hidden="true"></span>
                 </p>
                 <p class="text-white english px-3">
                    <u>Main Ingredient</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-1"></span> Noodles / Meat(or)Fish / Vegetable
                 </p>

                 <p class="text-white english px-3">
                    <u>Place of Origin</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-2"></span> JAPAN
                 </p>

                 <div class="text-center">

                   
                    <a class="btn btnMenu btn-outline-success english text-white text-white" href="login.php">
                    &ensp; Buy Now <i class='fas fa-shopping-cart' style='color:blue'></i> &ensp;
                    </a>
                 </div>

                </div>
          </div>
        </div>


        <div class="col-md-4">
          <div class="card bg-dark border-red" style="width: 20rem; border-color: gold;">
            <img src="./images/Peking Roasted Duck.jpg" style="height: 300px;" class="card-img-top" alt="...">
               <div class="card-block py-2">
                 <h5 class="card-title english text-white text-center py-2">Chicken Masala <hr style="background:gold;"></h5>

                 <p class="text-center">
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                 </p>
                  <p class="text-white english px-3">
                    <u>Main Ingredient</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-1"></span> Chicken/Cream/Yogurt/Pepper
                 </p>

                 <p class="text-white english px-3">
                    <u>Place of Origin</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-2"></span>  INDIA
                 </p>

                 <div class="text-center">

                   
                    <a class="btn btnMenu btn-outline-success english text-white text-white" href="login.php">
                    &ensp; Buy Now <i class='fas fa-shopping-cart' style='color:blue'></i> &ensp;
                    </a>
                 </div>

                </div>
          </div>
        </div>


      </div>
  
  </div>
</section>

<section class="section-data container-fluid py-5">
  <div class="container">
    <div class="row justify-content-center">
      <h1 class="main-title text-center display-6 col-md-6 ">Weekly best Rating <span style="color: red;">European Food</span> of Our Restaurant <hr class="bg-dark"></h1>
    </div>

      <div class="row py-4">
        <div class="col-md-4">
          <div class="card bg-dark border-red" style="width: 20rem; border-color: gold;">
            <img src="./images/pasta.jpg" style="height: 300px;" class="card-img-top" alt="...">
               <div class="card-block py-2">
                 <h5 class="card-title english text-white text-center py-2">Italian Pasta <hr style="background:gold;"></h5>

                 <p class="text-center">
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white" aria-hidden="true"></span>
                 </p>
                  <p class="text-white english px-3">
                    <u>Main Ingredient</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-1"></span> Flour / Eggs / Sauce / Water
                 </p>

                 <p class="text-white english px-3">
                    <u>Place of Origin</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-2"></span> ITALY
                 </p>

                 <div class="text-center">

                   
                    <a class="btn btnMenu btn-outline-success english text-white text-white" href="login.php">
                    &ensp; Buy Now <i class='fas fa-shopping-cart' style='color:blue'></i> &ensp;
                    </a>
                 </div>

                </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card bg-dark border-red" style="width: 20rem; border-color: gold;">
            <img src="./images/paella.jpg" style="height: 300px;" class="card-img-top" alt="...">
               <div class="card-block py-2">
                 <h5 class="card-title english text-white text-center py-2">Paella <hr style="background:gold;"></h5>

                 <p class="text-center">
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star-half text-white" aria-hidden="true"></span>
                 </p>
                  <p class="text-white english px-3">
                    <u>Main Ingredient</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-1"></span>   Rice / Chicken / Vegetable / Suffron 
                 </p>

                 <p class="text-white english px-3">
                    <u>Place of Origin</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-2"></span> SPAIN
                 </p>

                 <div class="text-center">

                   
                    <a class="btn btnMenu btn-outline-success english text-white text-white" href="login.php">
                    &ensp; Buy Now <i class='fas fa-shopping-cart' style='color:blue'></i> &ensp;
                    </a>
                 </div>

                </div>
          </div>
        </div>


        <div class="col-md-4">
          <div class="card bg-dark border-red" style="width: 20rem; border-color: gold;">
            <img src="./images/cassoulet.jpg" style="height: 300px;" class="card-img-top" alt="...">
               <div class="card-block py-2">
                 <h5 class="card-title english text-white text-center py-2">Cassoulet <hr style="background:gold;"></h5>

                 <p class="text-center">
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                   <span class="fa fa-star text-white"></span>
                 </p>
                  <p class="text-white english px-3">
                    <u>Main Ingredient</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-1"></span> Various Meat / White Haricot Beans
                 </p>

                 <p class="text-white english px-3">
                    <u>Place of Origin</u>
                 </p>

                 <p class="text-white english px-3">
                   <span class="fa fa-asterisk text-warning mr-2"></span> FRANCE
                 </p>

                 <div class="text-center">

                  
                    <a class="btn btnMenu btn-outline-success english text-white text-white" href="login.php">
                     &ensp; Buy Now <i class='fas fa-shopping-cart' style='color:blue'></i> &ensp;
                    </a>
                 </div>

                </div>
          </div>
        </div>


      </div>
  
  </div>
</section>

<footer class="menufooter">
  <section class="Totop" >
    <a href="#top"><h3 class="text-center english"> www.ROLLONGSTONE.com</h3></a>
  </section>
</footer>

<script src="./js/jquery.js"></script>
<script src="./js/tether.js"></script>
<script src="./js/bootstrap.main.js"></script>
<script type="./js/fontawesome.min.js"></script>
</body>
</html>