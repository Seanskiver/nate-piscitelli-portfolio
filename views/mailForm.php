<section class="col-lg-12 col-md-12 col-sm-12 mainSect" style="margin-top: 60px;" id="contact">
    <div class="col-lg-12 col-sm-12 col-md-12">
        <h1 class="heading-text">Contact Me</h1>    
    </div>
    
    <form id="mailForm" class="col-lg-6 col-md-10 col-sm-12 col-lg-offset-3 col-md-offset-3">
        <div class="form-group col-lg-6 col-md-6 col-sm-14">
            <label for="first">First Name</label>
            <input type="text" class="form-control" id="first" name="first" required/>
            <span class="err" id="err-first"></span>
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-14">
            <label for="last">Last Name</label>
            <input type="text" class="form-control" id="last" name="last" required/>
            <span class="err" id="err-last"></span>            
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required/>
            <span class="err" id="err-email"></span>
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" required ></textarea>
            <span class="err" id="err-message"></span>          
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <input type="submit" class="btn btn-success" id="mail-submit" value="Send Message"/>    
            <b id="successMessage">Message sent successfully&nbsp;<i class="glyphicon glyphicon-ok"></i></b>
        </div>
        
    </form>
</section>




<p class="err" id="err-mail"></p>
