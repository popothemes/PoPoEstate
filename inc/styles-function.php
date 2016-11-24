<?php

function realtor_css()
{
    global $realtor_default_options;
    $css="";

    $css=$css.'.testimonial-image{background:url('.get_theme_mod('realtor_home_testimonials_image',$realtor_default_options['realtor_home_testimonial_image']).') no-repeat left bottom;padding:50px 0 220px 356px;}';
    $css=$css.'.address-button i,.call-button i{background:'.realtor_get_primary_color().';}';
    list($r, $g, $b) = sscanf(realtor_get_primary_color(), "#%02x%02x%02x");
    $css=$css.'.advance-search-section{background:'."rgba($r,$g,$b,0.7);}";
    $css=$css.'.search-sec input:focus{background:'.realtor_get_primary_color().';}';
    $css=$css.'blockquote {
    padding: 20px 20px 20px 60px;
    background: url('.get_template_directory_uri().'/images/quote.png) no-repeat 20px 30px '.realtor_get_primary_color().';
    margin: 30px 0 30px 30px;
    color: #fff;}';
    $css=$css.".dropdown-menu {border-top: 3px solid ".realtor_get_primary_color().";}";
    $css=$css.".features-text a {color: ".realtor_get_primary_color().";}";
    $css=$css.".localities-box:hover{background:".realtor_get_primary_color().";}";
    $css=$css.".localities-head:after{background:".realtor_get_primary_color().";}";
    $css=$css.".lable-tag{background:".realtor_get_primary_color().";}";
    $css=$css.".properties-carousel .lable-tag:before {border-top: 6px solid ".realtor_get_primary_color().";}";
    $css=$css.".owl-theme .owl-controls .owl-page.active span{border-color:".realtor_get_primary_color().";background:".realtor_get_primary_color()."}";
    $css=$css.".r-property-box:hover .r-property-price span{background:".realtor_get_primary_color().";}";
    $css=$css.".section-agent{background:".realtor_get_primary_color().";}";
    $css=$css.".team-box:hover .pluss{border-right: 41px solid ".realtor_get_primary_color().";}";
    $css=$css."#blog-single .pagination li {background-color: ".realtor_get_primary_color()."};";
    $css=$css."a,a:active,a:visited,a:focus{color:".realtor_get_primary_color()."}";
    $css=$css.".text-option .dropdown-menu li a span{color:".realtor_get_primary_color()."}";
    $css=$css.".property-price a:hover{color:".realtor_get_primary_color().";}";
    $css=$css."

    .r-property-price a:hover{color:".realtor_get_primary_color().";}
    .arrow a:hover{border-color:".realtor_get_primary_color().";color:".realtor_get_primary_color().";}
    .team-box .social-media li a:hover{background:".realtor_get_primary_color().";}
    ul.oval-list li:before{border:3px solid ".realtor_get_primary_color().";}
    .testimonial-box{border:3px solid ".realtor_get_primary_color().";}
    .section-purchase-now{background:".realtor_get_primary_color().";}
    .footer{border-top:5px solid ".realtor_get_primary_color().";}
    .footer-tag a:hover{background:".realtor_get_primary_color().";}
    .popular-overlay .more-over:hover{color:".realtor_get_primary_color().";}
    .sort-item .list-view.active{color:".realtor_get_primary_color().";}
    .sort-item .grid-view.active{color:".realtor_get_primary_color().";}
    .page-result .line{border:1px solid ".realtor_get_primary_color().";}
    .pagination>li>a:hover, .pagination>li>span:hover, .pagination>li>a:focus, .pagination>li>span:focus {border:1px solid ".realtor_get_primary_color().";}
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {background-color: ".realtor_get_primary_color().";}
    .s-property:hover{border:1px solid ".realtor_get_primary_color().";}
    a.left-arrow:hover{color:".realtor_get_primary_color().";}
    a.right-arrow:hover{color:".realtor_get_primary_color().";}
    .agent-detail .contacts i{color:".realtor_get_primary_color().";}
    .avtar div{background:".realtor_get_primary_color().";}
    .blog-info a:hover{color:".realtor_get_primary_color().";}
    .search-section .input-group-btn:last-child>.btn{background:".realtor_get_primary_color().";}
    .white-quote{border-left:12px solid ".realtor_get_primary_color().";}
    .green-quote{background:url(../images/quote.png) no-repeat 20px 30px ".realtor_get_primary_color().";}
    .comment-respond .form-control:focus{border:1px solid ".realtor_get_primary_color().";}
    .testimonial-box:after{border-right: 100px solid ".realtor_get_primary_color().";}
    .logo-bottom a{color:".realtor_get_primary_color()."}
    a {color: ".realtor_get_primary_color()."; }
    .sale-form .btn-success{background:".realtor_get_primary_color().";}
    .sale-form .btn-success:hover{background:".dechex((hexdec(realtor_get_primary_color())-hexdec('61b24')))."}
    .single-status {background-color: ".realtor_get_primary_color().";}
    .blog-page ul li:before {color: ".realtor_get_primary_color().";}
    .news-space a:hover{color:".realtor_get_primary_color().";}


    ";





    return $css;

}
