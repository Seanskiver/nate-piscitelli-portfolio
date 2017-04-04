<?php include $_SERVER["DOCUMENT_ROOT"].'/views/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4" id="form-column">
            <div id="form-cont">
                <form action="." method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" class="form-control" name="username" id="username" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <input type="hidden" name="action" value="login" />
                    <input class="btn btn-primary" type="submit" value="Submit"/>
                </form>
            </div>            
        </div>
    </div>
</div>