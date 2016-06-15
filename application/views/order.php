<script type="text/javascript">
    $(document).ready(function(){
    var current = 1;
    
    widget      = $(".step");
    btnnext     = $(".next");
    btnback     = $(".back"); 
    btnsubmit   = $(".submit");

    // Init buttons and UI
    widget.not(':eq(0)').hide();
    hideButtons(current);
    setProgress(current);

    // Next button click action
    btnnext.click(function(){
        if(current < widget.length){            
                   widget.show();           
                   widget.not(':eq('+(current++)+')').hide();
           setProgress(current); 
           }        
               hideButtons(current);    
       })   
       // Back button click action  
       btnback.click(function(){        
                if(current > 1){
            current = current - 2;
            btnnext.trigger('click');
        }
        hideButtons(current);
    })          
});

// Change progress bar action
setProgress = function(currstep){
    var percent = parseFloat(100 / widget.length) * currstep;
    percent = percent.toFixed();
    $(".progress-bar")
        .css("width",percent+"%")
        .html(percent+"%");     
}

// Hide buttons according to the current step
hideButtons = function(current){
    var limit = parseInt(widget.length); 

    $(".action").hide();

    if(current < limit) btnnext.show();     if(current > 1) btnback.show();
    if (current == limit) { btnnext.hide(); btnsubmit.show(); }
}

</script>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.min.css');?>">
    <link href="<?php echo base_url('asset/font-awesome/css/font-awesome.css')?>" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/global.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/style.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/colorbox.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/custom.css');?>">
    <!--Script-->
    <script src="<?php echo base_url('asset/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('asset/js/jquery.colorbox.js');?>"></script>
</head>
<div class="container">
	<div class="row">
        <div class="col-md-6 col-md-offset-3">
    	    <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"</div>
            </div>
            <div class="step well">Step 1</div>
            <div class="step well">Step 2</div>
            <div class="step well">Step 3</div>
            <div class="step well">Step 4</div>
            <div class="step well">Step 5</div>
            <div class="step well">Step 6</div>
            <pre class="brush:html"><button class="action back btn btn-info">Back</button>
            <button class="action next btn btn-info">Next</button>
            <button class="action submit btn btn-success">Submit</button>
        </div>
	</div>
</div>