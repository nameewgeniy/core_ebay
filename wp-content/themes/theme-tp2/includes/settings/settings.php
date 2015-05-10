<?php
/**
 *	Include library GhostSettingsBundle;
 */
include_once('GhostSettingsBundle/GhostCategory.php');
include_once('GhostSettingsBundle/GhostItem.php');
include_once('GhostSettingsBundle/GhostMenu.php');
include_once('GhostSettingsBundle/GhostOptions.php');
include_once('GhostSettingsBundle/GhostPages.php');

function ghost_settings()
{
	ghost_settings_page_and_menu();

	/*global $wp_rewrite;
	$option = new GhostOptions();
	$permalink_structure = $option->findByName('permalink_structure')->getValue();
	$wp_rewrite->set_permalink_structure($permalink_structure);
    $wp_rewrite->flush_rules();*/
}
add_action('after_switch_theme', ghost_settings());



function ghost_settings_page_and_menu()
{
	// create pages
	$host = $_SERVER['HTTP_HOST'];

	$formView = '<div class="form-group"><label for="name">Your Name (required)</label>
                    [text your-name id:name class:form-control]
                 </div>
                <div class="form-group">
                    <label for="email ">Your Name (required)</label>
                     [email your-email id:email class:form-control]
                 </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                     [text your-subject id:subject class:form-control]
                 </div>

                <div class="form-group">
                    <label for="text-mes">Your Message</label>
                    [textarea your-message id:text-mes class:form-control]
                 </div>
                [submit class:btn class:btn-info "Send"]';

	$pages = new GhostPages();
	if(!$pages->isPageByTitle('Contact Us')) {
		$contact = new GhostPages();
		$contact->setTitle('Contact Us');
		$contact->setContent('<h1>HAVE A QUESTION? CONTACT US!</h1>
		[contact-form-7 id="6132" title="Contact form 1"]')
		->save();
	}
	if($pages->setType('wpcf7_contact_form')->isPageByTitle('Contact form 1')) {

		$form = new GhostPages();
		$form->setType('wpcf7_contact_form')->findByTitle('Contact form 1');
		$form->setContent($formView)->save();
		update_post_meta( $form->getId(), '_form', $formView );		
	} else {
		$form = new GhostPages();
		$form->setType('wpcf7_contact_form')->setTitle('Contact form 1');
		$form->setContent($formView)->save();
		
		add_post_meta( $form->getId(), '_form', $formView );
	} $pages->setType('page');

	/*if(!$pages->isPageByTitle('Privacy Policy')) {
		$privacy = new GhostPages();
		$privacy->setTitle('Privacy Policy');
		$privacy->setContent('<h1>Privacy Policy</h1>
			This privacy policy discloses the privacy practices for <a href="http://'.$host.'">'.$host.'</a>. This privacy policy applies solely to information collected by this web site. It will notify you of the following:
			<ol>
				<li>What personally identifiable information is collected from you through the web site, how it is used and with whom it may be shared.</li>
				<li>What choices are available to you regarding the use of your data.</li>
				<li>The security procedures in place to protect the misuse of your information.</li>
				<li>How you can correct any inaccuracies in the information.</li>
			</ol>
			<h3>Information Collection, Use, and Sharing</h3>
			We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.
			We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request, e.g. to ship an order.
			Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.
			<h3>Your Access to and Control Over Information</h3>
			You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website:
			<ul>
				<li>See what data we have about you, if any.</li>
				<li>Change/correct any data we have about you.</li>
				<li>Have us delete any data we have about you.</li>
				<li>Express any concern you have about our use of your data.</li>
			</ul>
			<h3>Security</h3>
			We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline.
			Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. You can verify this by looking for a closed lock icon at the bottom of your web browser, or looking for “https” at the beginning of the address of the web page.
			While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment.'
		)->save();
	}*/
	
	/*if(!$pages->isPageByTitle('Sitemap')) {
		$pagenotfound = new GhostPages();
		$pnf_id = $pagenotfound->findByTitle('Page not found')->getId();

		$homepage = new GhostPages();
		$home_id = $homepage->findByTitle('Home')->getId();

		$sitemap = new GhostPages();
		$sitemap->setTitle('Sitemap')->setContent('')->save();

		$sitemap->setContent('<h1>Sitemap</h1>
			<h2>Pages ([gsmcount post="page" exclude="'.$sitemap->getId().','.$pnf_id.','.$home_id.'"])</h2>
			[gsm class="b2-sitemap" pclass="b2-pagination wp-pagenavi text-center" post="page" notfound="Pages Not Found" exclude="'.$sitemap->getId().','.$pnf_id.','.$home_id.'"]
			<h2>Blog posts ([gsmcount post="post" exclude=""])</h2>
			[gsm class="b2-sitemap" pclass="b2-pagination wp-pagenavi text-center" post="post" notfound="Posts Not Found" exclude=""]
			<h2>Products ([gsmcount post="product" exclude=""])</h2>
			[gsm class="b2-sitemap" pclass="b2-pagination wp-pagenavi text-center" post="product" notfound="Products Not Found" exclude="" posts_per_page="100"]'
		)->save();
	}*/
	if($pages->isPageByTitle('Sample Page')) {
		$pages->findByTitle('Sample Page')->delete();
	}

	$blog  = new GhostCategory();
	if($blog->findById(1)) {
		$blog->setName('Blog')->setSlug('blog')->save();
	} else {
		$blog->setName('Blog')->save();
	}
    $main_menu = new GhostMenu();
    $contact  = new GhostPages();
    $contactItem  = new GhostItem();
    $home      = new GhostItem();
    $product   = new GhostItem();
    $blogItem   = new GhostItem();

    $product->setTitle('Catalogue')->setUrl('/maep_products');
    $contact->findByTitle('Contact Us');
    $home->setTitle('Home')->setUrl('/');
    $blogItem->setCategory($blog);

    $main_menu->addItem(array(
        $home,
        $product,
        $contactItem->setPage($contact),
    ));
    $main_menu->setName('main_menu')->save();

}
/*
function ghost_activate_plugin(array $plugins_to_active)
{
	$plugins = get_option('active_plugins'); // get active plugins

	foreach ( $plugins_to_active as $plugin ) {
		if ( ! in_array( $plugin, $plugins ) ) {
			array_push( $plugins, $plugin );
		}
	}

	update_option( 'active_plugins', $plugins );
}

function recurse_copy($src, $dst)
{ 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 
*/