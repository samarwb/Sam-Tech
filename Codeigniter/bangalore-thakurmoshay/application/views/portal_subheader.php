<?php switch (arg(2)) {
    case 'gallary':
        $desc = 'Gallary <small> :My recent pujas</small>';

         break;
     case 'puja_service':
        $desc = 'Coming Soon! ';

         break;
     case 'blog':
        $desc = 'My Blogs! ';

         break;
     case 'contact_me':
        $desc = 'Contact Me! ';

         break;

    default:
        break;
} ?>
<section id="bannerSection" style="background:url(themes/images/banner/portfolio.png) no-repeat center center #000;">
	<div class="container" >	
		<h1 id="pageTitle"><?php print $desc; ?>
		<span class="pull-right toolTipgroup">
			<a href="#" data-placement="top" data-original-title="Find us on via facebook">
                            <img style="width:45px" src="<?php print base_url().'themes/images/facebook.png' ;?>" alt="facebook" title="facebook">
                        </a>
			<a href="#" data-placement="top" data-original-title="Find us on via twitter">
                            <img style="width:45px" src="<?php print base_url().'themes/images/twitter.png' ;?>" alt="twitter" title="twitter">
                        </a>
			<a href="#" data-placement="top" data-original-title="Find us on via youtube">
                            <img style="width:45px" src="<?php print base_url().'themes/images/youtube.png' ;?>" alt="youtube" title="youtube">
                        </a>
		</span>
		</h1>
	</div>
</section>