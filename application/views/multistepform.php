<html>
<head>
    <title>Multistep Registration form</title>
    <meta content="noindex, nofollow" name="robots">
    <!-- Including CSS File Here -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Including JS File Here -->
    <script src="<?php echo base_url(); ?>js/jquery-1.12.3.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
    <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<style>
    /*progressbar*/
    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        /*CSS counters to number the steps*/
        counter-reset: step;
    }
    #progressbar li {
        list-style-type: none;
        color: white;
        text-transform: uppercase;
        font-size: 9px;
        width: 33.33%;
        float: left;
        position: relative;
    }
    #progressbar li:before {
        content: counter(step);
        counter-increment: step;
        width: 20px;
        line-height: 20px;
        display: block;
        font-size: 10px;
        color: #333;
        background: white;
        border-radius: 3px;
        margin: 0 auto 5px auto;
    }
    /*progressbar connectors*/
    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: white;
        position: absolute;
        left: -50%;
        top: 9px;
        z-index: -1; /*put it behind the numbers*/
    }
    #progressbar li:first-child:after {
        /*connector not needed before the first step*/
        content: none;
    }
    /*marking active/completed steps green*/
    /*The number of the step and the connector before it = green*/
    #progressbar li.active:before,  #progressbar li.active:after{
        background: #27AE60;
        color: white;
    }
</style>
</head>
<body>
<!-- multistep form-->
<form id="msform" name="msform" method="post" action="<?php echo base_url();?>user/saveMul">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active">Account Setup</li>
        <li>Social Profiles</li>
        <li>Personal Details</li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">Create your account</h2>

        <h3 class="fs-subtitle">This is step 1</h3>
        <input type="text" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="password" placeholder="Confirm Password"/>
        <input type="button" name="next" class="next action-button" value="Next"/>
    </fieldset>
    <fieldset style="display:none">
        <h2 class="fs-title">Social Profiles</h2>

        <h3 class="fs-subtitle">Your presence on the social network</h3>
        <input type="text" name="twitter" placeholder="Twitter"/>
        <input type="text" name="facebook" placeholder="Facebook"/>
        <input type="text" name="gplus" placeholder="Google Plus"/>
        <input type="button" name="previous" class="previous action-button" value="Previous"/>
        <input type="button" name="next" class="next action-button" value="Next"/>
    </fieldset>
    <fieldset style="display:none">
        <h2 class="fs-title">Personal Details</h2>

        <h3 class="fs-subtitle">We will never sell it</h3>
        <input type="text" name="firstname" placeholder="First Name"/>
        <input type="text" name="lastname" placeholder="Last Name"/>
        <input type="text" name="phone" placeholder="Phone"/>
        <textarea name="address" placeholder="Address"></textarea>
        <input type="button" name="previous" class="previous" value="Previous"/>
        <input type="submit" class="submit action-button" value="Submit"/>
    </fieldset>
</form>
</body>
</html>
<script>
    $(document).ready(function () {

        var current_fs, next_fs, prev_fs;
        var animating;

        $(".next").click(function () {
            if (animating) return false;
            animating = true;
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            next_fs.show();
            current_fs.hide();
            animating = false;
        });
        $(".previous").click(function () {
            current_fs = $(this).parent();
            prev_fs = $(this).parent().prev();
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            prev_fs.show();
            current_fs.hide();
        });
    });

</script>
