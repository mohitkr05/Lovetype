<?php
/**
 *
 * @package lovetype
 */
function optionsframework_option_name() {

	/* This gets the theme name from the stylesheet. */
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings       = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;

	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Returns a select list of Google fonts
 * Feel free to edit this, update the fallbacks, etc.
 */
function options_typography_get_google_fonts() {
	// Google Font Defaults
	$google_faces = array(
		'Arvo, serif' => 'Arvo',
		'Copse, sans-serif' => 'Copse',
		'Droid Sans, sans-serif' => 'Droid Sans',
		'Droid Serif, serif' => 'Droid Serif',
		'Lobster, cursive' => 'Lobster',
		'Nobile, sans-serif' => 'Nobile',
		'Open Sans, sans-serif' => 'Open Sans',
		'Oswald, sans-serif' => 'Oswald',
		'Pacifico, cursive' => 'Pacifico',
		'Rokkitt, serif' => 'Rokkit',
		'PT Sans, sans-serif' => 'PT Sans',
		'Quattrocento, serif' => 'Quattrocento',
		'Raleway, cursive' => 'Raleway',
		'Ubuntu, sans-serif' => 'Ubuntu',
		'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz'
	);
	return $google_faces;
}


/**
 * Defines an array of options that will be used to generate the 
 * settings page and be saved in the database.
 *
 * @since 1.0
 */
function optionsframework_options() {
	
	/* Image path. */
	$layoutpath  =  trailingslashit( LOVETYPE_IMAGE ) . 'layouts/';
	$layoutimg  =  get_stylesheet_directory_uri() . '/inc/img/layouts/';
	$patternpath =  trailingslashit( LOVETYPE_IMAGE ) . 'bg/';
	
	/* Create an array of background options. */
	$background = array(
		'color'      => '',
		'image'      => '',
		'repeat'     => 'repeat',
		'position'   => 'top center',
		'attachment' =>'scroll' 
	);
	
	/* Create an array of select options. */
	$select = array(
		'enable'  => __( 'Enable' , 'lovetype' ), 
		'disable' => __( 'Disable', 'lovetype' ) 
	);

	/* Create an array of pattern options. */
	$patterns = array(
		'pattern-0'  => $patternpath . '0.png',
		'pattern-1'  => $patternpath . '1.png',
		'pattern-2'  => $patternpath . '2.png',
		'pattern-3'  => $patternpath . '3.png',
		'pattern-4'  => $patternpath . '4.png',
		'pattern-5'  => $patternpath . '5.jpg',
		'pattern-6'  => $patternpath . '6.jpg',
		'pattern-7'  => $patternpath . '7.png',
		'pattern-8'  => $patternpath . '8.png',
		'pattern-9'  => $patternpath . '9.png',
		'pattern-10' => $patternpath . '10.png'
	);
		
	/* Empty array */
	$options = array();

	$options[] = array( 
		'name' => __( 'Welcome', 'lovetype' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => 'About Us',
		'desc' => '',
		'type' => 'info'
	);
	
	/* Start GENERAL settings. */
	$options[] = array( 
		'name' => __( 'General', 'lovetype' ),
		'type' => 'heading'
	);
								
	$options[] = array( 
		'name' => __( 'Custom Favicon', 'lovetype' ),
		'desc' => __( 'Upload a favicon for your website, or specify the image address of your online favicon. (http://example.com/favicon.png)', 'lovetype' ),
		'id'   => 'lovetype_custom_favicon',
		'type' => 'upload'
	);
						
	$options[] = array( 
		'name'    => __( 'Social Shares', 'lovetype' ),
		'desc'    => __( 'Display social Shares on single posts', 'lovetype' ),
		'id'   => 'lovetype_social_shares_single',
		'type' => 'checkbox'
	);
	$options[] = array( 
		'name'    => __( 'Social Shares', 'lovetype' ),
		'desc'    => __( 'Display social Shares on Archive posts', 'lovetype' ),
		'id'   => 'lovetype_social_shares_archive',
		'type' => 'checkbox'
	);


	$options[] = array( 
		'name' => __( 'Disable credit links', 'lovetype' ),
		'desc' => __( 'Are you sure want to disable the credit link for WordPress and theme author?', 'lovetype' ),
		'id'   => 'lovetype_credits',
		'type' => 'checkbox'
	);
						
	/* ============================== End General Settings ================================= */	
	
	$options[] = array( 
		'name' => __( 'Theme', 'lovetype' ),
		'type' => 'heading'
	);
	
	$options[] = array( 
		'name'    => __( 'Bootswatch Themes', 'lovetype' ),
		'desc'    => __( 'Select the Bootswatch themes', 'lovetype' ),
		'id'      => 'lovetype_bootswatch',
		'std'     => 'cosmo',
		'type'    => 'images',
		'options' => array(
			'amelia'  => $layoutimg . 'bs1.png',
			'cerulean'  => $layoutimg . 'bs2.png',
			'cosmo' => $layoutimg . 'bs3.png',
			'cyborg' => $layoutimg . 'bs4.png',
			'darkly' => $layoutimg . 'bs5.png',
			'flatly' => $layoutimg . 'bs6.png',
			'journal' => $layoutimg . 'bs7.png',
			'lumen' => $layoutimg . 'bs8.png',
			'readable' => $layoutimg . 'bs9.png',
			'simplex' => $layoutimg . 'bs10.png',
			'slate' => $layoutimg . 'bs11.png',
			'spacelab' => $layoutimg . 'bs12.png',
			'superhero' => $layoutimg . 'bs13.png',
			'united' => $layoutimg . 'bs14.png',
			'yeti' => $layoutimg . 'bs15.png'
		)
	);
						

	/* ============================== End Theme Settings ================================= */	
	
	$options[] = array( 
		'name' => __( 'Typography', 'lovetype' ),
		'type' => 'heading'
	);
/*
	$options[] = array( 
		'name' => __( 'Disable custom typography', 'lovetype' ),
		'desc' => __( 'Disable custom typography and use theme defaults.', 'lovetype' ),
		'id'   => 'lovetype_disable_typography',
		'std'  => true,
		'type' => 'checkbox' 
	);


	$options[] = array( 'name' => 'Selected Google Fonts',
	'desc' => 'Fifteen of the top google fonts.',
	'id' => 'google_font',
	'std' => array( 'size' => '36px', 'face' => 'Rokkitt, serif', 'color' => '#00bc96'),
	'type' => 'typography',
	'options' => array(
		'faces' => options_typography_get_google_fonts(),
		'styles' => false )
	);*/
	$options[] = array( 
		'name'    => __( 'Content typography', 'lovetype' ),
		'desc'    => __( 'This font is used for content text.', 'lovetype' ),
		'id'      => 'lovetype_content_font',	
		'std'     => array('size' => '13px','face' => '"Open Sans", sans-serif', 'color' => '#333333' ),
		'type'    => 'typography',	
		'options' => array(
			'sizes' => array( '12','13','14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24' ),
			'faces' => options_typography_get_google_fonts(),
			'styles' => array( 'normal' => 'Normal', 'bold' => 'Bold' )
		)
	);

	$options[] = array( 
		'name'    => __( 'Content heading typography', 'lovetype' ),
		'desc'    => __( 'Select the headline font (h1,h2,h3 etc)', 'lovetype' ),
		'id'      => 'lovetype_heading_font',
		'std'     => array('size' => '13px','face' => '"Francois One", sans-serif', 'color' => '#333333' ),
		'type'    => 'typography',
		'options' => array(
			'sizes' => false,
			'faces' => options_typography_get_google_fonts(),
			'styles' => array( 'normal' => 'Normal',  'bold' => 'Bold' )
		)
	);

	/* ============================== End Typography Settings ================================= */

	$options[] = array( 
		'name' => __( 'Page', 'lovetype' ),
		'type' => 'heading'
	);
						
	$options[] = array( 
		'name' => __( 'Display author box', 'lovetype' ),
		'desc' => __( 'Check this option if you want display the author box on single posts', 'lovetype' ),
		'id'   => 'lovetype_author_box',
		'type' => 'checkbox'
	);

	/* ============================== End Page Settings ================================= */

	$options[] = array( 
		'name' => __( 'Custom Code', 'lovetype' ),
		'type' => 'heading'
	);

	$options[] = array( 
		'name' => __( 'Custom CSS', 'lovetype' ),
		'desc' => __( 'Quickly add some CSS to your theme by adding it to this block.', 'lovetype' ),
		'id'   => 'lovetype_custom_css',
		'std'  => '',
		'type' => 'textarea'
	); 
						
	$options[] = array( 
		'name' => __( 'Header Code', 'lovetype' ),
		'desc' => __( 'Add any custom script like the meta verification from various search engine. It will be inserted before the closing head tag of your theme', 'lovetype' ),
		'id'   => 'lovetype_header_code',
		'type' => 'textarea'
	); 	
						
	$options[] = array( 
		'name' => __( 'Footer Code', 'lovetype' ),
		'desc' => __( 'Add your analytic code or you can add any custom script here. It will be inserted before the closing body tag of your theme', 'lovetype' ),
		'id'   => 'lovetype_footer_code',
		'type' => 'textarea'
	); 		 	 

	/* ============================== End Custom Code Settings ================================= */
	
	
	/* ============================== Start ShortCode Reference Section ================================= */					
	$options[] = array( 
		'name' => __( 'Bootstrap Shortcodes', 'lovetype' ),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => 'Important Note!',
		'desc' => '
			<h1 id="bootstrap-shortcodes-for-wordpress">Bootstrap Shortcodes for WordPress</h1>
<p>WordPress plugin that provides shortcodes for easier use of the Bootstrap styles and components in your content.</p>
<h2 id="requirements">Requirements</h2>
<p>This plugin won&#39;t do anything if you don&#39;t have WordPress theme built with the <a href="http://getbootstrap.com/">Bootstrap</a> framework. <strong>This plugin does not include the Bootstrap framework</strong>.</p>
<p>The plugin is tested to work with <code>Bootstrap 3.2</code> and <code>WordPress 3.9</code>.</p>
<p>This plugin contains a <code>composer.json</code> file for those of you who manage your PHP dependencies with <a href="https://getcomposer.org">Composer</a>.</p>
<h2 id="shortcode-reference">Shortcode Reference</h2>
<h3 id="css">CSS</h3>
<ul>
<li><a href="#grid">Grid</a></li>
<li><a href="#lead-body-copy">Lead body copy</a></li>
<li><a href="#emphasis-classes">Emphasis classes</a></li>
<li><a href="#code">Code</a></li>
<li><a href="#tables">Tables</a></li>
<li><a href="#buttons">Buttons</a></li>
<li><a href="#images">Images</a></li>
<li><a href="#responsive-utilities">Responsive utilities</a></li>
</ul>
<h3 id="components">Components</h3>
<ul>
<li><a href="#icons">Icons</a></li>
<li><a href="#button-groups">Button Groups</a></li>
<li><a href="#button-dropdowns">Button Dropdowns</a></li>
<li><a href="#navs">Navs</a></li>
<li><a href="#breadcrumbs">Breadcrumbs</a></li>
<li><a href="#labels">Labels</a></li>
<li><a href="#badges">Badges</a></li>
<li><a href="#jumbotron">Jumbotron</a></li>
<li><a href="#page-header">Page Header</a></li>
<li><a href="#thumbnails">Thumbnails</a></li>
<li><a href="#alerts">Alerts</a></li>
<li><a href="#progress-bars">Progress Bars</a></li>
<li><a href="#media-objects">Media Objects</a></li>
<li><a href="#list-groups">List Groups</a></li>
<li><a href="#panels">Panels</a></li>
<li><a href="#wells">Wells</a></li>
</ul>
<h3 id="javascript">JavaScript</h3>
<ul>
<li><a href="#tabs">Tabs</a></li>
<li><a href="#tooltip">Tooltip</a></li>
<li><a href="#popover">Popover</a></li>
<li><a href="#collapse">Collapse</a></li>
<li><a href="#carousel">Carousel</a></li>
<li><a href="#modal">Modal</a></li>
</ul>
<h1 id="usage">Usage</h1>
<h3 id="css">CSS</h3>
<h3 id="grid">Grid</h3>
<pre><code>  [row]
    [column md=&quot;6&quot;]
      …
    [/column]
    [column md=&quot;6&quot;]
      …
    [/column]
  [/row]</code></pre>
<p>The container component is also supported in case your theme doesn&#39;t incude a container.</p>
<pre><code>[container]
  [row]
    [column md=&quot;6&quot;]
      …
    [/column]
    [column md=&quot;6&quot;]
      …
    [/column]
  [/row]
[/container]</code></pre>
<h4 id="-container-parameters">[container] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>fluid</td>
<td>Is the container fluid? (see Bootstrap documentation for details)</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-row-parameters">[row] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-column-parameters">[column] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xs</td>
<td>Size of column on extra small screens (less than 768px)</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>sm</td>
<td>Size of column on small screens (greater than 768px)</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>md</td>
<td>Size of column on medium screens (greater than 992px)</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>lg</td>
<td>Size of column on large screens (greater than 1200px)</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>offset_xs</td>
<td>Offset on extra small screens</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>offset_sm</td>
<td>Offset on small screens</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>offset_md</td>
<td>Offset on column on medium screens</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>offset_lg</td>
<td>Offset on column on large screens</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>pull_xs</td>
<td>Pull on extra small screens</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>pull_sm</td>
<td>Pull on small screens</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>pull_md</td>
<td>Pull on column on medium screens</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>pull_lg</td>
<td>Pull on column on large screens</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>push_xs</td>
<td>Push on extra small screens</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>push_sm</td>
<td>Push on small screens</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>push_md</td>
<td>Push on column on medium screens</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>push_lg</td>
<td>Push on column on large screens</td>
<td>optional</td>
<td>1-12</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/css/#grid">Bootstrap grid documentation</a>.</p>
<hr>
<h3 id="lead-body-copy">Lead body copy</h3>
<pre><code>[lead] … [/lead]</code></pre>
<h4 id="-lead-parameters">[lead] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/css/#type-body-copy">Bootstrap body copy documentation</a></p>
<hr>
<h3 id="emphasis-classes">Emphasis classes</h3>
<pre><code>[emphasis type=&quot;success&quot;] … [/emphasis]</code></pre>
<h4 id="-emphasis-parameters">[emphasis] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>type</td>
<td>The type of label to display</td>
<td>required</td>
<td>muted, primary, success, info, warning, danger</td>
<td>muted</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/css/#type-emphasis">Bootstrap emphasis classes documentation</a></p>
<hr>
<h3 id="code">Code</h3>
<pre><code>[code] … [/code]</code></pre>
<h4 id="-code-parameters">[code] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>inline</td>
<td>Display inline code</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>scrollable</td>
<td>Set a max height of 350px and provide a scroll bar. Not usable with inline=&quot;true&quot;.</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/css/#code">Bootstrap code documentation</a></p>
<hr>
<h3 id="tables">Tables</h3>
<pre><code>[table-wrap bordered=&quot;true&quot; striped=&quot;true&quot;]

    Standard HTML table code goes here.

[/table-wrap]</code></pre>
<h4 id="-table-wrap-parameters">[table-wrap] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>bordered</td>
<td>Set &quot;bordered&quot; table style (see Bootstrap documentation)</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>striped</td>
<td>Set &quot;striped&quot; table style (see Bootstrap documentation)</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>hover</td>
<td>Set &quot;hover&quot; table style (see Bootstrap documentation)</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>condensed</td>
<td>Set &quot;condensed&quot; table style (see Bootstrap documentation)</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/css/#tables">Bootstrap table documentation</a></p>
<hr>
<h3 id="buttons">Buttons</h3>
<pre><code>[button type=&quot;success&quot; size=&quot;lg&quot; link=&quot;#&quot;] … [/button]</code></pre>
<h4 id="-button-parameters">[button] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>type</td>
<td>The type of the button</td>
<td>optional</td>
<td>default, primary, success, info, warning, danger, link</td>
<td>default</td>
</tr>
<tr>
<td>size</td>
<td>The size of the button</td>
<td>optional</td>
<td>xs, sm, lg</td>
<td>none</td>
</tr>
<tr>
<td>block</td>
<td>Whether the button should be a block-level button</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>dropdown</td>
<td>Whether the button triggers a dropdown menu (see <a href="#button-dropdowns">Button Dropdowns</a>)</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>active</td>
<td>Apply the &quot;active&quot; style</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>disabled</td>
<td>Whether the button be disabled</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>link</td>
<td>The url you want the button to link to</td>
<td>optional</td>
<td>any valid link</td>
<td>none</td>
</tr>
<tr>
<td>target</td>
<td>Target for the link</td>
<td>optional</td>
<td>any valid target</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/css/#buttons">Bootstrap button documentation</a></p>
<hr>
<h3 id="images">Images</h3>
<pre><code>[img type=&quot;circle&quot; responsive=&quot;true&quot;] … [/img]</code></pre>
<p>Wrap any number of HTML image tags or images inserted via the WordPress media manager.</p>
<h4 id="-img-parameters">[img] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>type</td>
<td>The effect to apply to wrapped images</td>
<td>optional</td>
<td>rounded, circle, thumbnail</td>
<td>false</td>
</tr>
<tr>
<td>responsive</td>
<td>Make the wrapped images responsive</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/css/#images">Bootstrap images documentation</a></p>
<hr>
<h3 id="responsive-utilities">Responsive Utilities</h3>
<pre><code>[responsive visible_block=&quot;lg md&quot; hidden=&quot;sn xs&quot;] … [/responsive]</code></pre>
<h4 id="-reponsive-parameters">[reponsive] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>visible</td>
<td>Sizes at which this element is visible (separated by spaces) <strong>NOTE: as of Bootstrap 3.2 &quot;visible&quot; is deprecated in favor of &quot;block&quot;, &quot;inline&quot;, and &quot;inline-block&quot; (see below)</strong></td>
<td>optional</td>
<td>xs, sm, md, lg</td>
<td>false</td>
</tr>
<tr>
<td>hidden</td>
<td>Sizes at which this element is hidden (separated by spaces)</td>
<td>optional</td>
<td>xs, sm, md, lg</td>
<td>false</td>
</tr>
<tr>
<td>block</td>
<td>Sizes at which this element is visible and displayed as a &quot;block&quot; element (separated by spaces)</td>
<td>optional</td>
<td>xs, sm, md, lg</td>
<td>false</td>
</tr>
<tr>
<td>inline</td>
<td>Sizes at which this element is visible and displayed as an &quot;inline&quot; element (separated by spaces)</td>
<td>optional</td>
<td>xs, sm, md, lg</td>
<td>false</td>
</tr>
<tr>
<td>inline_block</td>
<td>Sizes at which this element is visible and displayed as an &quot;inline-block&quot; element (separated by spaces)</td>
<td>optional</td>
<td>xs, sm, md, lg</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/css/#type-emphasis">Bootstrap emphasis classes documentation</a></p>
<hr>
<h3 id="components">Components</h3>
<h3 id="icons">Icons</h3>
<pre><code>[icon type=&quot;arrow&quot;]</code></pre>
<h4 id="-icon-parameters">[icon] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>type</td>
<td>The type of icon you want to display</td>
<td>required</td>
<td>See Bootstrap docs</td>
<td>none</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#glyphicons">Bootstrap Glyphicons documentation</a></p>
<hr>
<h3 id="button-groups">Button Groups</h3>
<h4 id="basic-example">Basic example</h4>
<pre><code>[button-group size=&quot;lg&quot; justified=&quot;&quot; vertical=&quot;&quot;]
    [button link=&quot;#&quot;] … [/button]
    [button link=&quot;#&quot;] … [/button]
    [button link=&quot;#&quot;] … [/button]
[/button-group]</code></pre>
<h4 id="button-toolbar">Button toolbar</h4>
<pre><code>[button-toolbar]
    [button-group]
        [button link=&quot;#&quot;] … [/button]
        [button link=&quot;#&quot;] … [/button]
        [button link=&quot;#&quot;] … [/button]
    [/button-group]
    [button-group]
        [button link=&quot;#&quot;] … [/button]
        [button link=&quot;#&quot;] … [/button]
        [button link=&quot;#&quot;] … [/button]
    [/button-group]
    [button-group]
        [button link=&quot;#&quot;] … [/button]
    [/button-group]
[/button-toolbar]</code></pre>
<h4 id="-button-group-parameters">[button-group] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>size</td>
<td>The size of the button group</td>
<td>optional</td>
<td>xs, sm, lg</td>
<td>none</td>
</tr>
<tr>
<td>justified</td>
<td>Whether button group is justified</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>vertical</td>
<td>Whether button group is vertical</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>dropup</td>
<td><strong>Must correspond with the use of [dropdown]</strong></td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-button-toolbar-parameters">[button-toolbar] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/css/#btn-groups">Bootstrap button groups documentation</a></p>
<hr>
<h3 id="button-dropdowns">Button Dropdowns</h3>
<p>Button Dropdowns can be accomplished by combining the [button-group] shortcode, the &quot;data&quot; parameters of the [button] shortcode, and [dropdown] shortcode as follows.</p>
<h4 id="single-button-dropdowns">Single button dropdowns</h4>
<pre><code>[button-group]
    [button link=&quot;#&quot; dropdown=&quot;true&quot; data=&quot;toggle,dropdown&quot;] … [caret][/button]
    [dropdown]
        [dropdown-header] … [/dropdown-header]
        [dropdown-item link=&quot;#&quot;] … [/dropdown-item]
        [dropdown-item link=&quot;#&quot;] … [/dropdown-item]
        [dropdown-item link=&quot;#&quot;] … [/dropdown-item]
        [divider]
        [dropdown-item link=&quot;#&quot;] … [/dropdown-item]
    [/dropdown]
[/button-group]</code></pre>
<h4 id="split-button-dropdowns">Split button dropdowns</h4>
<pre><code>[button-group]
    [button link=&quot;#&quot;] … [/button]
    [button dropdown=&quot;true&quot; data=&quot;toggle,dropdown&quot;][caret][/button]
    [dropdown]
        [dropdown-item link=&quot;#&quot;] … [/dropdown-item]
        [divider]
        [dropdown-item link=&quot;#&quot;] … [/dropdown-item]
    [/dropdown]
[/button-group]</code></pre>
<h4 id="dropup-variation">Dropup variation</h4>
<pre><code>[button-group dropup=&quot;true&quot;]
    [button link=&quot;#&quot;] … [/button]
    [button dropdown=&quot;true&quot; data=&quot;toggle,dropdown&quot;][caret][/button]
    [dropdown]
        [dropdown-item link=&quot;#&quot;] … [/dropdown-item]
        [divider]
        [dropdown-item link=&quot;#&quot;] … [/dropdown-item]
    [/dropdown]
[/button-group]  </code></pre>
<h4 id="-dropdown-parameters">[dropdown] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-dropdown-item-parameters">[dropdown-item] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>link</td>
<td>The url you want the dropdown-item to link to</td>
<td>optional</td>
<td>any valid link</td>
<td>none</td>
</tr>
<tr>
<td>disabled</td>
<td>Whether this menu-item is disabled</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-dropdown-header-parameters">[dropdown-header] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-caret-parameters">[caret] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-divider-parameters">[divider] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#btn-dropdowns">Bootstrap button dropdowns documentation</a></p>
<hr>
<h3 id="navs">Navs</h3>
<pre><code>[nav type=&quot;pills&quot;]
    [nav-item link=&quot;#&quot;] … [/nav-item]
    [nav-item link=&quot;#&quot;] … [/nav-item]
    [nav-item link=&quot;#&quot;] … [/nav-item]
[/nav]</code></pre>
<h4 id="nav-with-dropdowns">Nav with dropdowns</h4>
<pre><code>[nav type=&quot;pills&quot;]
    [nav-item link=&quot;#&quot; active=&quot;true&quot;] … [/nav-item]
    [nav-item dropdown=&quot;true&quot; link=&quot;#&quot;] … [caret]
        [dropdown]
            [dropdown-item link=&quot;#&quot;] … [/dropdown-item]
            [dropdown-item link=&quot;#&quot;] … [/dropdown-item]
        [/dropdown]
    [/nav-item]
[/nav]</code></pre>
<h4 id="-nav-parameters">[nav] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>type</td>
<td>The type of nav</td>
<td>required</td>
<td>tabs, pills</td>
<td>tabs</td>
</tr>
<tr>
<td>stacked</td>
<td>Whether the nav is stacked (should be used with &quot;pills&quot; type</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>justified</td>
<td>Whether the nav is justified</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-nav-item-parameters">[nav-item] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>link</td>
<td>The url you want the dropdown-item to link to</td>
<td>optional</td>
<td>any valid link</td>
<td>none</td>
</tr>
<tr>
<td>active</td>
<td>Whether the item has the &quot;active&quot; style applied</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>disabled</td>
<td>Whether the item is disabled</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#nav">Bootstrap button navs documentation</a></p>
<hr>
<h3 id="breadcrumbs">Breadcrumbs</h3>
<pre><code>[breadcrumb]
    [breadcrumb-item link=&quot;#&quot;] … [/breadcrumb-item]
    [breadcrumb-item link=&quot;#&quot;] … [/breadcrumb-item]
    [breadcrumb-item link=&quot;#&quot;] … [/breadcrumb-item]
[/breadcrumb]</code></pre>
<h4 id="-breadcrumb-parameters">[breadcrumb] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-breadcrumb-item-parameters">[breadcrumb-item] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>link</td>
<td>The url you want the breadcrumb-item to link to</td>
<td>optional</td>
<td>any valid link</td>
<td>none</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#breadcrumbs">Bootstrap breadcrumbs documentation</a></p>
<hr>
<h3 id="labels">Labels</h3>
<pre><code>[label type=&quot;success&quot;] … [/label]</code></pre>
<h4 id="-label-parameters">[label] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>type</td>
<td>The type of label to display</td>
<td>optional</td>
<td>default, primary, success, info, warning, danger</td>
<td>default</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#labels">Bootstrap label documentation</a></p>
<hr>
<h3 id="badges">Badges</h3>
<pre><code>[badge right=&quot;true&quot;] … [/badge]</code></pre>
<h4 id="-badge-parameters">[badge] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>right</td>
<td>Whether the badge should align to the right of its container</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#badges">Bootstrap badges documentation</a></p>
<hr>
<h3 id="jumbotron">Jumbotron</h3>
<pre><code>[jumbotron title=&quot;My Jumbotron&quot;] … [/jumbotron]</code></pre>
<h4 id="-jumbotron-parameters">[jumbotron] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>title</td>
<td>The jumbotron title</td>
<td>optional</td>
<td>Any text</td>
<td>none</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#jumbotron">Bootstrap jumbotron documentation</a></p>
<hr>
<h3 id="page-header">Page Header</h3>
<pre><code>[page-header] … [/page-header]</code></pre>
<p>Automatically inserts H1 tag if not present</p>
<h4 id="-page-header-parameters">[page-header] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#page-header">Bootstrap page-header documentation</a></p>
<hr>
<h3 id="thumbnails">Thumbnails</h3>
<pre><code>[thumbnail] … [/thumbnail]
[thumbnail] … [/thumbnail]
[thumbnail] … [/thumbnail]</code></pre>
<h4 id="-thumbnail-parameters">[thumbnail] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#thumbnails">Bootstrap thumbnails documentation</a></p>
<hr>
<h3 id="alerts">Alerts</h3>
<pre><code>[alert type=&quot;success&quot;] … [/alert]</code></pre>
<h4 id="-alert-parameters">[alert] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>type</td>
<td>The type of the alert</td>
<td>required</td>
<td>success, info, warning, danger</td>
<td>success</td>
</tr>
<tr>
<td>dismissable</td>
<td>If the alert should be dismissable</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#alerts">Bootstrap alert documentation</a></p>
<hr>
<h3 id="progress-bars">Progress Bars</h3>
<pre><code>[progress striped=&quot;true&quot;]
    [progress-bar percent=&quot;50&quot;]
    [progress-bar percent=&quot;25&quot; type=&quot;success&quot;]
[/progress]</code></pre>
<h4 id="-progress-parameters">[progress] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>striped</td>
<td>Whether enclosed progress bars will be striped</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>animated</td>
<td>Whether enclosed progress bars will be animated</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-progress-bar-parameters">[progress-bar] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>percent</td>
<td>The percentage amount to show in the progress bar</td>
<td>required</td>
<td>any number between 0 and 100</td>
<td>false</td>
</tr>
<tr>
<td>label</td>
<td>Whether to show the percentage as a text label inside the bar</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>type</td>
<td>The type of the progress bar</td>
<td>optional</td>
<td>default, primary, success, info, warning, danger</td>
<td>default</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#progress">Bootstrap progress bars documentation</a></p>
<hr>
<h3 id="media-objects">Media Objects</h3>
<pre><code>[media]
  [media-object pull=&quot;right&quot;]
    …
  [/media-object]
  [media-body title=&quot;Testing&quot;]
    …
  [/media-body]
[/media]</code></pre>
<h4 id="-media-parameters">[media] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-media-object-parameters">[media-object] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>pull</td>
<td>Whether the image pulls to the left or right</td>
<td>optional</td>
<td>left, right</td>
<td>right</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-media-body-parameters">[media-body] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>title</td>
<td>The object title</td>
<td>required</td>
<td>Any text</td>
<td>none</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><strong>NOTE: media-object should contain an image, or linked image, inserted using the WordPress TinyMCE editor</strong></p>
<p><a href="http://getbootstrap.com/components/#media">Bootstrap media objects documentation</a></p>
<hr>
<h3 id="list-groups">List Groups</h3>
<h4 id="basic-example">Basic Example</h4>
<pre><code>[list-group]
  [list-group-item]
    …
  [/list-group-item]
  [list-group-item]
    …
  [/list-group-item]
  [list-group-item]
    …
  [/list-group-item]
[/list-group]</code></pre>
<h4 id="linked-items">Linked Items</h4>
<pre><code>[list-group linked=&quot;true&quot;]
  [list-group-item link=&quot;#&quot; active=&quot;true&quot;]
    …
  [/list-group-item]
  [list-group-item link=&quot;#&quot;]
    …
  [/list-group-item]
  [list-group-item link=&quot;#&quot;]
    …
  [/list-group-item]
[/list-group]</code></pre>
<h4 id="custom-content">Custom Content</h4>
<pre><code>[list-group linked=&quot;true&quot;]
  [list-group-item link=&quot;#&quot; active=&quot;true&quot;]
    [list-group-item-heading]…[/list-group-item-heading]
    [list-group-item-text]…[/list-group-item-text]
  [/list-group-item]
  [list-group-item link=&quot;#&quot;]
    [list-group-item-heading]…[/list-group-item-heading]
    [list-group-item-text]…[/list-group-item-text]
  [/list-group-item]
  [list-group-item link=&quot;#&quot;]
    [list-group-item-heading]…[/list-group-item-heading]
    [list-group-item-text]…[/list-group-item-text]
  [/list-group-item]
[/list-group]</code></pre>
<h4 id="-list-group-parameters">[list-group] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>linked</td>
<td>Whether this is a linked list group, or a standard one</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-list-group-item-parameters">[list-group-item] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>link</td>
<td>The url you want the list item to link to <strong>Must correspond with the &quot;linked&quot; parameter in [list-group]</strong></td>
<td>optional</td>
<td>any text</td>
<td>false</td>
</tr>
<tr>
<td>type</td>
<td>The type of the list-group-item</td>
<td>optional</td>
<td>primary, success, info, warning, danger, link</td>
<td>none</td>
</tr>
<tr>
<td>active</td>
<td>Whether the item has the &quot;active&quot; style applied</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>target</td>
<td>Target for the link</td>
<td>optional</td>
<td>any valid target</td>
<td>none</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-list-group-item-heading-parameters">[list-group-item-heading] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-list-group-item-text-parameters">[list-group-item-text] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#list-group">Bootstrap list groups documentation</a></p>
<hr>
<h3 id="panels">Panels</h3>
<pre><code>[panel type=&quot;info&quot; heading=&quot;Panel Title&quot; footer=&quot;Footer text&quot;] … [/panel]</code></pre>
<h4 id="-panel-parameters">[panel] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>type</td>
<td>The type of the panel</td>
<td>optional</td>
<td>default, primary, success, info, warning, danger, link</td>
<td>default</td>
</tr>
<tr>
<td>heading</td>
<td>The panel heading</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>title</td>
<td>Whether the panel heading should have a title tag around it</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>footer</td>
<td>The panel footer text if desired</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#panels">Bootstrap panels documentation</a></p>
<hr>
<h3 id="wells">Wells</h3>
<pre><code>[well size=&quot;sm&quot;] … [/well]</code></pre>
<h4 id="-well-parameters">[well] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>size</td>
<td>Modifies the amount of padding inside the well</td>
<td>optional</td>
<td>sm, lg</td>
<td>normal</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/components/#wells">Bootstrap wells documentation</a></p>
<hr>
<h3 id="javascript">Javascript</h3>
<h3 id="tabs">Tabs</h3>
<pre><code>[tabs type=&quot;tabs&quot;]
  [tab title=&quot;Home&quot; active=&quot;true&quot;]
    …
  [/tab]
  [tab title=&quot;Profile&quot;]
    …
  [/tab]
  [tab title=&quot;Messages&quot;]
    …
  [/tab]
[/tabs]</code></pre>
<h4 id="-tabs-parameters">[tabs] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>type</td>
<td>The type of nav</td>
<td>required</td>
<td>tabs, pills</td>
<td>tabs</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-tab-parameters">[tab] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>title</td>
<td>The title of the tab</td>
<td>required</td>
<td>any text</td>
<td>false</td>
</tr>
<tr>
<td>active</td>
<td>Whether this tab should be &quot;active&quot; or selected</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>fade</td>
<td>Whether to use the &quot;fade&quot; effect when showing this tab</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/javascript/#tabs">Bootstrap tabs documentation</a></p>
<hr>
<h3 id="tooltip">Tooltip</h3>
<pre><code>[tooltip title=&quot;I&#39;m the title&quot; placement=&quot;right&quot;] … [/tooltip]</code></pre>
<h4 id="-tooltip-parameters">[tooltip] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>title</td>
<td>The text of the tooltip</td>
<td>required</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>placement</td>
<td>The placement of the tooltip</td>
<td>optional</td>
<td>left, top, bottom, right</td>
<td>top</td>
</tr>
<tr>
<td>animation</td>
<td>apply a CSS fade transition to the tooltip</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>html</td>
<td>Insert HTML into the tooltip</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/javascript/#tooltips">Bootstrap tooltip documentation</a></p>
<hr>
<h3 id="popover">Popover</h3>
<pre><code>[popover title=&quot;I&#39;m the title&quot; content=&quot;And here&#39;s some amazing content. It&#39;s very engaging. right?&quot; placement=&quot;right&quot;] … [/popover]</code></pre>
<h4 id="-popover-parameters">[popover] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>title</td>
<td>The title of the popover</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>text</td>
<td>The text of the popover</td>
<td>required</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>placement</td>
<td>The placement of the popover</td>
<td>optional</td>
<td>left, top, bottom, right</td>
<td>top</td>
</tr>
<tr>
<td>animation</td>
<td>apply a CSS fade transition to the tooltip</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>html</td>
<td>Insert HTML into the tooltip</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/javascript/#popovers">Bootstrap popover documentation</a></p>
<hr>
<h3 id="collapse">Collapse</h3>
<pre><code>[collapsibles]
  [collapse title=&quot;Collapse 1&quot; active=&quot;true&quot;]
    …
  [/collapse]
  [collapse title=&quot;Collapse 2&quot;]
    …
  [/collapse]
  [collapse title=&quot;Collapse 3&quot;]
    …
  [/collapse]
[/collapsibles]</code></pre>
<h4 id="-collapsibles-parameters">[collapsibles] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-collapse-parameters">[collapse] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>title</td>
<td>The title of the collapsible, visible when collapsed</td>
<td>required</td>
<td>any text</td>
<td>false</td>
</tr>
<tr>
<td>type</td>
<td>The type of the panel</td>
<td>optional</td>
<td>default, primary, success, info, warning, danger, link</td>
<td>default</td>
</tr>
<tr>
<td>active</td>
<td>Whether the tab is expanded at load time</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/javascript/#collapse">Bootstrap collapse documentation</a></p>
<hr>
<h3 id="carousel">Carousel</h3>
<pre><code>[carousel]
    [carousel-item active=&quot;true&quot;] … [/carousel-item]
    [carousel-item] … [/carousel-item]
    [carousel-item] … [/carousel-item]
[/carousel]</code></pre>
<p>[carousel-item] wraps an HTML image tag or image inserted via the WordPress editor.</p>
<h4 id="-carousel-parameters">[carousel] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>interval</td>
<td>The amount of time to delay between automatically cycling an item. If false, carousel will not automatically cycle.</td>
<td>optional</td>
<td>any number (in ms) or &quot;false&quot;</td>
<td>5000</td>
</tr>
<tr>
<td>wrap</td>
<td>Whether the carousel should cycle continuously or have hard stops.</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-carousel-item-parameters">[carousel-item] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>active</td>
<td>Whether the item has the &quot;active&quot; style applied. One item MUST be set as active.</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>caption</td>
<td>This carousel slide&#39;s caption</td>
<td>optional</td>
<td>Any text</td>
<td>none</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/javascript/#carousel">Bootstrap carousel documentation</a></p>
<hr>
<h3 id="modal">Modal</h3>
<pre><code>[modal text=&quot;This is my modal&quot; title=&quot;Modal Title Goes Here&quot; xclass=&quot;btn btn-primary btn-large&quot;]
    …
    [modal-footer]
        [button type=&quot;primary&quot; link=&quot;#&quot; data=&quot;dismiss,modal&quot;]Dismiss[/button]
    [/modal-footer]
[/modal]</code></pre>
<h4 id="-modal-parameters">[modal] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>text</td>
<td>Text of the modal trigger link</td>
<td>required</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>title</td>
<td>Title of the modal popup</td>
<td>required</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>size</td>
<td>Optional modal size</td>
<td>optional</td>
<td>lg, sm</td>
<td>none</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add to the trigger link</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<h4 id="-modal-footer-parameters">[modal-footer] parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
<tr>
<td>data</td>
<td>Data attribute and value pairs separated by a comma. Pairs separated by pipe (see example at <a href="#button-dropdowns">Button Dropdowns</a>).</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://getbootstrap.com/javascript/#modals">Bootstrap modal documentation</a></p>
<hr>


		',
		'type' => 'info'
	);
	
	
	/* ============================== End Featured slider Settings ================================= */					
	
		
	/* ============================== Start Fontawesome Reference Section ================================= */					
	$options[] = array( 
		'name' => __( 'Fontawesome Shortcodes', 'lovetype' ),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => 'Important Note!',
		'desc' => '
			 <h1 id="font-awesome-shortcodes-for-wordpress">Font Awesome Shortcodes for WordPress</h1>
<p>This is a plugin for WordPress that adds shortcodes for easier use of the Font Awesome icons in your content.</p>
<h2 id="requirements">Requirements</h2>
<p>This plugin won&#39;t do anything if you don&#39;t have WordPress theme built with <a href="http://fortawesome.github.io/Font-Awesome/">Font Awesome</a>. <strong>The plugin does not include Font Awesome</strong>.</p>
<p>The plugin is tested to work with <code>Font Awesome version 4.1</code> and <code>WordPress 3.9</code>.</p>
<h2 id="shortcode-reference">Supported shortcodes</h2>
<ul>
<li><a href="#icons">Icons</a></li>
<li><a href="#icon-stacks">Icon Stacks</a></li>
</ul>
<h3 id="usage">Usage</h3>
<h3 id="icons">Icons</h3>
<pre><code>[fa type=&quot;exclamation&quot;]</code></pre>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>type</td>
<td>The type of icon you want to display</td>
<td>required</td>
<td>See Font Awesome docs</td>
<td>none</td>
</tr>
<tr>
<td>size</td>
<td>Icon size</td>
<td>optional</td>
<td>lg, 2x 3x, 4x, 5x</td>
<td>false</td>
</tr>
<tr>
<td>border</td>
<td>Whether the font is displayed using the &quot;bordered&quot; style</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>spin</td>
<td>Whether the font is displayed spinning</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>list_item</td>
<td>Set &quot;true&quot; if the icon is within a list item for better spacing</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>fixed_width</td>
<td>Set &quot;true&quot; if the icon should keep a fixed width for spacing in a menu</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>rotate</td>
<td>Rotate the icon a number of degrees</td>
<td>optional</td>
<td>normal, 90, 180, 270</td>
<td>false</td>
</tr>
<tr>
<td>flip</td>
<td>Flip the icon vertically or horizontally</td>
<td>optional</td>
<td>vertical, horizontal</td>
<td>false</td>
</tr>
<tr>
<td>stack_size</td>
<td>If this icon is in a stack, what size is it?</td>
<td>optional</td>
<td>lg, 2x 3x, 4x, 5x</td>
<td>false</td>
</tr>
<tr>
<td>inverse</td>
<td>Whether this icon&#39;s color should be inverted (useful in stacks)</td>
<td>optional</td>
<td>true, false</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/">Icon Reference</a>.</p>
<hr>
<h3 id="icon-stacks">Icon Stacks</h3>
<pre><code>[fa-stack size=&quot;lg&quot;] 
    [fa type=&quot;circle&quot; stack_size=&quot;2x&quot;]
    [fa type=&quot;flag&quot; inverse=&quot;true&quot; stack_size=&quot;1x&quot;]
[/fa-stack]</code></pre>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Description</th>
<th>Required</th>
<th>Values</th>
<th>Default</th>
</tr>
</thead>
<tbody>
<tr>
<td>size</td>
<td>Icon size</td>
<td>optional</td>
<td>lg, 2x 3x, 4x, 5x</td>
<td>false</td>
</tr>
<tr>
<td>xclass</td>
<td>Any extra classes you want to add</td>
<td>optional</td>
<td>any text</td>
<td>none</td>
</tr>
</tbody>
</table>
<p><a href="http://fortawesome.github.io/Font-Awesome/examples/">Font Awesome documentation</a>.</p>


		',
		'type' => 'info'
	);
	
	
	/* ============================== End Featured slider Settings ================================= */					

	return $options;
	
}
?>
