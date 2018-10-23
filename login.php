<?php
    include_once'.\php\nav.php';
?>
        
        <!--Login Form-->
        
        <div class="container">	
            <div class="row" style="margin-bottom:100px; margin-top:100px;">
                <h2>Login</h2><br/>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Start form -->
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-check"> 
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>


                    <!-- End form -->
                </div>



            </div>
        </div>
        <?php
        require_once'./php/footer.php';