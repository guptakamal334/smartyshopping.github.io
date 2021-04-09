<?php
        require('header.php');

?>
  <!-- -------------------------carasoul----------------------------- -->
  <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="media/banner9.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="media/banner2.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="media/banner3.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
   </div>


<!-- ----------------------About Section----------------------- -->
   <div class="about" id="about">
     <h2 class="title">ABOUT US</h2>
     <P>
      The aim of this project is to design database management for help desk, which is
      completely interactive. The system can help the customer information retrieval
      services of the helpdesk in very quickly a proper way as well to maintain help desk
      information efficiently. The system also creates various reports needed by the
      Enquire/ Reception of helpdesk.
      The system may need modification when they are changes in procedure within the
      HELPDESK OF MOBILE PRODUCT or new requirement from the user. To ease
      the task of making these modifications, documentation is necessary. So further
      documentation gives us a full understanding about this system and helps us to do
      modifications effectively and efficiently.
      In the fast growing world of computers, this type of computerized environment has
      proved a great advantage for all of us. It not only provides the fastest mode of
      working but it saves a lot of time of other and our also. Manually we can do a lot
      of work but it is so less in comparison to machine works, so in that way also
      computerized system is very safe, reliable and easy to work on it. Computer is the
      big demand of today’s world as everybody wants to get in touch with it so that it
      will make his/her work more comprise and more easier. So the basic aim of
      converting the manual work into computerized work 
     </P>
   </div>

   <!-- -----------------------------contact Us------------------------ -->
<div class="contact" id="contact">
    <h2 class="title">CONTACT US</h2>
    <div class="row">
        <div class="colu-2">
            <img src="media/contact.png" alt="contact page">
        </div>
        <div class="colu-2">
            <form action="" id="contact">
                <label for="name">NAME</label>
                <input type="text" name="name" id="name" placeholder="Enter name....."><br>
                <span class="error_msg" id="error_name" ></span><br>

                <label for="mobile">MOBILE</label>
                <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile Number....."><br>
                <span  class="error_msg" id="error_mobile"></span><br>

                <label for="email">EMAIL</label>
                <input type="text" name="email" id="email" placeholder="Enter email....."><br>
                <span  class="error_msg" id="error_email"></span>  <br>

                <label for="comment">COMMENT</label>
                <textarea name="comment" id="query" cols="40" rows="2" placeholder="enter comment....."></textarea>
                <span class="error_msg" id="error_query"></span><br>

                <button type="button" onclick="send_message()">SUBMIT</button><br>
                <span  class="error_msg" id="error_button"></span> 
            </form>
        </div>
    </div>
</div>

<?php
    require('footer.php');
?>