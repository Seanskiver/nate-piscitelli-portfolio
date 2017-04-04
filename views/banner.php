    <?php if (isset($_SESSION['user_id'])) : ?>
        <div id="edit-mode-container">
            <span id="edit-mode-text">Edit mode</span>
            <label class="switch">
              <input type="checkbox" id="edit-mode-check">
              <div class="slider round"></div>
            </label>     
        </div>
    <?php endif; ?>
    
    <div class="row">
        <div id="banner">
            <!--BANNER-->
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4" id="profile-container">
                <img src="/img/profile.png"  class="" id="profile-pic"/>        
            </div>
            
            
            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-8">
                <div class="col-lg-8 col-md-9 col-sm-8 col-xs-11">
                    <h1 id="name"><span class="caps">N</span>athaniel <span class="caps">P</span>iscitelli</h1>
                    <h4 id="name_subtext"><span class="caps">A</span>RCHITECTURE <span class="caps">S</span>TUDENT</h4>                
                </div>        


                <!--DETAILS-->
                <ul class="col-lg-2 col-md-2 col-sm-2 col-xs-12" id="info-list">
                    <li><a href="tel://1-585-808-5170" ><i class="glyphicon glyphicon-phone"></i></a></li>
                    <li><i class="glyphicon glyphicon-envelope"></i></li>
                    <li><a href="http://www.linkedin.com/in/nathaniel-piscitelli" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                </ul>                
            </div>
        </div>
    </div>
