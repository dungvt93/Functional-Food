<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package web2feel
 * @since web2feel 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'web2feel' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site wrapper">
<div class="container_12">
	<header id="masthead" class="site-header cf" role="banner">
	
			<div class="top grid_12 cf ">
		
				<div class="head">
					<div class="logo">
						
	<?php if (get_theme_mod(FT_scope::tool()->optionsName . '_logo', '') != '') { ?>
				<h1 class="site-title logo"><a class="mylogo" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img relWidth="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxWidth', 0)); ?>" relHeight="<?php echo intval(get_theme_mod(FT_scope::tool()->optionsName . '_maxHeight', 0)); ?>" id="ft_logo" src="<?php echo get_theme_mod(FT_scope::tool()->optionsName . '_logo', ''); ?>" alt="" /></a></h1>
	<?php } else { ?>
				<h1 class="site-title logo"><a id="blogname" rel="home" href="<?php bloginfo('siteurl');?>/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	<?php } ?>

						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</div>
					<div class="top-ad">
					<div id="search">	
						<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
						<input type="text" name="s" id="s" value="Search ..." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
					<div class="select-type">	
						<select id="post_type" name="post_type">
							<option value="products">Products</option>
							<option value="post">Blog</option>
						</select>
					</div>
						<input type="submit" id="searchsubmit" value="Search" />
					</form>
					</div>
		
					
					</div>
					<div class="clearfix"></div>
				</div>
				
				<div class="sub-head">
				<div id="botmenu">
						<?php wp_nav_menu( array( 'container_id' => 'submenu', 'theme_location' => 'primary','menu_id'=>'web2feel' ,'menu_class'=>'sfmenu','fallback_cb'=> 'fallbackmenu' ) ); ?>
				</div>
				<div class="searchbox">
					 <?php the_dropdown_taxonomy('department'); ?> 		
				</div>
				</div>
			</div>

	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main cf">
<?php

// Region code and Product ASIN
$response = getAmazonPrice("com", "B00KQPGRRE");

function getAmazonPrice($region, $asin) {

    $xml = aws_signed_request($region, array(
        "Operation" => "ItemLookup",
        "ItemId" => $asin,
        "IncludeReviewsSummary" => False,
        "ResponseGroup" => "Medium,OfferSummary",
    ));

    $item = $xml->Items->Item;
    $title = htmlentities((string) $item->ItemAttributes->Title);
    $url = htmlentities((string) $item->DetailPageURL);
    $image = htmlentities((string) $item->MediumImage->URL);
    $price = htmlentities((string) $item->OfferSummary->LowestNewPrice->Amount);
    $code = htmlentities((string) $item->OfferSummary->LowestNewPrice->CurrencyCode);
    $qty = htmlentities((string) $item->OfferSummary->TotalNew);

    if ($qty !== "0") {
        $response = array(
            "code" => $code,
            "price" => number_format((float) ($price / 100), 2, '.', ''),
            "image" => $image,
            "url" => $url,
            "title" => $title
        );
    }

    return $response;
}

function getPage($url) {

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_FAILONERROR, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $html = curl_exec($curl);
    curl_close($curl);
    return $html;
}

function aws_signed_request($region, $params) {

    $public_key = "AKIAIX5E5UBSGSEFLDJA";
    $private_key = "1oc3qoTnOoSPpd/NVIsbw0wh+NYjIfpZi7SkcK3n";

    $method = "GET";
    $host = "ecs.amazonaws." . $region;
    $host = "webservices.amazon." . $region;
    $uri = "/onca/xml";

    $params["Service"] = "AWSECommerceService";
    $params["AssociateTag"] = "dungvtfunctio-20"; // Put your Affiliate Code here
    $params["AWSAccessKeyId"] = $public_key;
    $params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z");
    $params["Version"] = "2011-08-01";

    ksort($params);

    $canonicalized_query = array();
    foreach ($params as $param => $value) {
        $param = str_replace("%7E", "~", rawurlencode($param));
        $value = str_replace("%7E", "~", rawurlencode($value));
        $canonicalized_query[] = $param . "=" . $value;
    }

    $canonicalized_query = implode("&", $canonicalized_query);

    $string_to_sign = $method . "\n" . $host . "\n" . $uri . "\n" . $canonicalized_query;
    $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $private_key, True));
    $signature = str_replace("%7E", "~", rawurlencode($signature));

    $request = "http://" . $host . $uri . "?" . $canonicalized_query . "&Signature=" . $signature;
    $response = getPage($request);

    $pxml = @simplexml_load_string($response);
    if ($pxml === False) {
        return False;// no xml
    } else {
        return $pxml;
    }
}

?>