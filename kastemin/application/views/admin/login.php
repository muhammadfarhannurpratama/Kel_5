<link href="<?php echo base_url().'bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
<style>
body{
    background: #ECEDF0;
}
.panel{
    border : 0px;
    border-top : 5px solid #0088CC;
    
}
label{
    font-weight : normal;
    color : #444444;
}
.btn{
    background: #0088CC;
    border : 1px solid #0088CC;
    border-bottom : 3px solid #0075B0;
}
.nav-tabs{
border : 0;
transform : translate(0.8%,9%);        
-webkit-transform : translate(0.8%,9%);        
-o-transform : translate(0.8%,9%);        
-moz-transform : translate(1%,10%);        

}
    .inner-addon { 
    position: relative; 
}

.inner-addon .glyphicon {
  position: absolute;
  padding: 10px;
}

.right-addon .glyphicon { right: 0px;}

.right-addon input { padding-right: 30px; }
</style>

<title>Login Admin</title>
<div class="container" style="margin-top:10%">
    <div class="row">
    <div class="col-md-5 col-md-offset-3">
        <div class="row placeholder">
            <div class="col-md-5">
                <img src="<?php echo base_url().'image/logo.PNG' ?>" class="img-responsive" style="margin-bottom:3%">    
            </div>
            <div class="col-md-7">
                <ul class="nav nav-tabs"  style="">
                    <li class="active pull-right"><a style="border : 1px solid #0088cc;background:#0088CC;color:white" href="" >Login</a></li>
                </ul>
            </div>
        </div>
            <div class="panel panel-primary">
            <div class="panel-body" style="padding : 7%">
                <form action='<?php echo base_url()."Admin/Cek"?>' method='post'>
                    <label>Username</label>           
                        <div class="inner-addon right-addon">
                            <span class="glyphicon glyphicon-user"></span>
                            <input type="text" value="<?php $this->input->post('username');?>" class="form-control" name="username" required>
                        </div>
                    <br>
                <label>Password</label>           
                    <div class="inner-addon right-addon">
                        <span class="glyphicon glyphicon-lock"></span>
                        <input type="password" class="form-control" name="pass" required>
                    </div>
                <br>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Sign In</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>


