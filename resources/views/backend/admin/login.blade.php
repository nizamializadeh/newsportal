<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<style>

    @import url(http://fonts.googleapis.com/css?family=Roboto);

    * {
        font-family: 'Roboto', sans-serif;
    }

    #login-modal .modal-dialog {
        width: 350px;
    }

    #login-modal input[type=text], input[type=password] {
        margin-top: 10px;
    }

    #div-login-msg,
    #div-lost-msg,
    #div-register-msg {
        border: 1px solid #dadfe1;
        height: 30px;
        line-height: 28px;
        transition: all ease-in-out 500ms;
    }

    #div-login-msg.success,
    #div-lost-msg.success,
    #div-register-msg.success {
        border: 1px solid #68c3a3;
        background-color: #c8f7c5;
    }

    #div-login-msg.error,
    #div-lost-msg.error,
    #div-register-msg.error {
        border: 1px solid #eb575b;
        background-color: #ffcad1;
    }

    #icon-login-msg,
    #icon-lost-msg,
    #icon-register-msg {
        width: 30px;
        float: left;
        line-height: 28px;
        text-align: center;
        background-color: #dadfe1;
        margin-right: 5px;
        transition: all ease-in-out 500ms;
    }

    #icon-login-msg.success,
    #icon-lost-msg.success,
    #icon-register-msg.success {
        background-color: #68c3a3 !important;
    }

    #icon-login-msg.error,
    #icon-lost-msg.error,
    #icon-register-msg.error {
        background-color: #eb575b !important;
    }

    #img_logo {
        max-height: 100px;
        max-width: 100px;
    }

    /* #########################################
       #    override the bootstrap configs     #
       ######################################### */

    .modal-backdrop.in {
        filter: alpha(opacity=50);
        opacity: .8;
    }

    .modal-content {
        background-color: #ececec;
        border: 1px solid #bdc3c7;
        border-radius: 0px;
        outline: 0;
    }

    .modal-header {
        min-height: 16.43px;
        padding: 15px 15px 15px 15px;
        border-bottom: 0px;
    }

    .modal-body {
        position: relative;
        padding: 5px 15px 5px 15px;
    }

    .modal-footer {
        padding: 15px 15px 15px 15px;
        text-align: left;
        border-top: 0px;
    }

    .checkbox {
        margin-bottom: 0px;
    }

    .btn {
        border-radius: 0px;
    }

    .btn:focus,
    .btn:active:focus,
    .btn.active:focus,
    .btn.focus,
    .btn:active.focus,
    .btn.active.focus {
        outline: none;
    }

    .btn-lg, .btn-group-lg>.btn {
        border-radius: 0px;
    }

    .btn-link {
        padding: 5px 10px 0px 0px;
        color: #95a5a6;
    }

    .btn-link:hover, .btn-link:focus {
        color: #2c3e50;
        text-decoration: none;
    }

    .glyphicon {
        top: 0px;
    }

    .form-control {
        border-radius: 0px;
    }
</style>
<!-- BEGIN # MODAL LOGIN -->
    <div class="modal-dialog">
        <div class="modal-content">

            <div id="div-forms">
                <!-- Begin # Login Form -->
                <form id="login-form" method="POST" action="{{ route('postAdminLogin') }}">
                    @csrf
                    <div class="modal-body">
                        <div id="div-login-msg">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg">Email and password.</span>
                        </div>
                        <input id="login_username" name="email" class="form-control" type="text" placeholder="Email " required>
                        <input id="login_password" name="password" class="form-control" type="password" placeholder="Password" required>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>

