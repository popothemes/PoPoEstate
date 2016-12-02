<?php

function poporealestate_css()
{
    global $poporealestate_default_options;
    $css="";

    $css=$css.'.testimonial-image{background:url('.esc_url(get_theme_mod('poporealestate_home_testimonials_image',$poporealestate_default_options['poporealestate_home_testimonial_image'])).') no-repeat left bottom;padding:50px 0 220px 356px;}';
    $css=$css.'.address-button i,.call-button i{background:'.poporealestate_get_primary_color().';}';
    list($r, $g, $b) = sscanf(poporealestate_get_primary_color(), "#%02x%02x%02x");
    $css=$css.'.advance-search-section{background:'."rgba($r,$g,$b,0.7);}";
    $css=$css.'.search-sec input:focus{background:'.poporealestate_get_primary_color().';}';
    $css=$css.'blockquote {
    padding: 20px 20px 20px 60px;
    background: url('.get_template_directory_uri().'/images/quote.png) no-repeat 20px 30px '.poporealestate_get_primary_color().';
    margin: 30px 0 30px 30px;
    color: #fff;}';
    $css=$css.".dropdown-menu {border-top: 3px solid ".poporealestate_get_primary_color().";}";
    $css=$css.".features-text a {color: ".poporealestate_get_primary_color().";}";
    $css=$css.".localities-box:hover{background:".poporealestate_get_primary_color().";}";
    $css=$css.".localities-head:after{background:".poporealestate_get_primary_color().";}";
    $css=$css.".lable-tag{background:".poporealestate_get_primary_color().";}";
    $css=$css.".properties-carousel .lable-tag:before {border-top: 6px solid ".poporealestate_get_primary_color().";}";
    $css=$css.".owl-theme .owl-controls .owl-page.active span{border-color:".poporealestate_get_primary_color().";background:".poporealestate_get_primary_color()."}";
    $css=$css.".r-property-box:hover .r-property-price span{background:".poporealestate_get_primary_color().";}";
    $css=$css.".section-agent{background:".poporealestate_get_primary_color().";}";
    $css=$css.".team-box:hover .pluss{border-right: 41px solid ".poporealestate_get_primary_color().";}";
    $css=$css."#blog-single .pagination li {background-color: ".poporealestate_get_primary_color()."};";
    $css=$css."a,a:active,a:visited,a:focus{color:".poporealestate_get_primary_color()."}";
    $css=$css.".text-option .dropdown-menu li a span{color:".poporealestate_get_primary_color()."}";
    $css=$css.".property-price a:hover{color:".poporealestate_get_primary_color().";}";
    $css=$css."

    .r-property-price a:hover{color:".poporealestate_get_primary_color().";}
    .arrow a:hover{border-color:".poporealestate_get_primary_color().";color:".poporealestate_get_primary_color().";}
    .team-box .social-media li a:hover{background:".poporealestate_get_primary_color().";}
    ul.oval-list li:before{border:3px solid ".poporealestate_get_primary_color().";}
    .testimonial-box{border:3px solid ".poporealestate_get_primary_color().";}
    .section-purchase-now{background:".poporealestate_get_primary_color().";}
    .footer{border-top:5px solid ".poporealestate_get_primary_color().";}
    .footer-tag a:hover{background:".poporealestate_get_primary_color().";}
    .popular-overlay .more-over:hover{color:".poporealestate_get_primary_color().";}
    .sort-item .list-view.active{color:".poporealestate_get_primary_color().";}
    .sort-item .grid-view.active{color:".poporealestate_get_primary_color().";}
    .page-result .line{border:1px solid ".poporealestate_get_primary_color().";}
    .pagination>li>a:hover, .pagination>li>span:hover, .pagination>li>a:focus, .pagination>li>span:focus {border:1px solid ".poporealestate_get_primary_color().";}
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {background-color: ".poporealestate_get_primary_color().";}
    .s-property:hover{border:1px solid ".poporealestate_get_primary_color().";}
    a.left-arrow:hover{color:".poporealestate_get_primary_color().";}
    a.right-arrow:hover{color:".poporealestate_get_primary_color().";}
    .agent-detail .contacts i{color:".poporealestate_get_primary_color().";}
    .avtar div{background:".poporealestate_get_primary_color().";}
    .blog-info a:hover{color:".poporealestate_get_primary_color().";}
    .search-section .input-group-btn:last-child>.btn{background:".poporealestate_get_primary_color().";}
    .white-quote{border-left:12px solid ".poporealestate_get_primary_color().";}
    .green-quote{background:url(../images/quote.png) no-repeat 20px 30px ".poporealestate_get_primary_color().";}
    .comment-respond .form-control:focus{border:1px solid ".poporealestate_get_primary_color().";}
    .testimonial-box:after{border-right: 100px solid ".poporealestate_get_primary_color().";}
    .logo-bottom a{color:".poporealestate_get_primary_color()."}
    a {color: ".poporealestate_get_primary_color()."; }
    .sale-form .btn-success,.wpcf7-submit{background:".poporealestate_get_primary_color().";}
    .sale-form .btn-success:hover{background:#".dechex((hexdec(poporealestate_get_primary_color())-hexdec('61b24'))).";}
    .wpcf7-submit:hover{background:#".dechex((hexdec(poporealestate_get_primary_color())-hexdec('61b24'))).";}
    .single-status {background-color: ".poporealestate_get_primary_color().";}
    .blog-page ul li:before {color: ".poporealestate_get_primary_color().";}
    .news-space a:hover{color:".poporealestate_get_primary_color().";}

    .top-header{background:".poporealestate_get_secondary_color().";}
    .footer {background: ".poporealestate_get_secondary_color().";}

    ".esc_textarea(get_theme_mod('poporealestate_custom_css',''))."


    ";

    return $css;

}
