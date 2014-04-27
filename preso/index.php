<?php

	define('URL',"http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if($_SERVER['HTTP_HOST'] == 'presentation.dev'){
		define('DEMOURL',"http://".$_SERVER['HTTP_HOST']."/demo/");
	}else{
		define('DEMOURL',"http://".$_SERVER['HTTP_HOST']."/wpjsbackagain/demo/");
	}

?><!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">

		<title>WP-to-JS and Back Again</title>

		<meta name="description" content="A framework for easily creating beautiful presentations using HTML">
		<meta name="author" content="Hakim El Hattab">

		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="<?php echo URL; ?>css/reveal.min.css">
		<link rel="stylesheet" href="<?php echo URL; ?>css/theme/custom.css" id="theme">

		<!-- For syntax highlighting -->
		<link rel="stylesheet" href="<?php echo URL; ?>lib/css/zenburn.css">

		<!-- If the query includes 'print-pdf', include the PDF print sheet -->
		<script>
			if( window.location.search.match( /print-pdf/gi ) ) {
				var link = document.createElement( 'link' );
				link.rel = 'stylesheet';
				link.type = 'text/css';
				link.href = '<?php echo URL; ?>/css/print/pdf.css';
				document.getElementsByTagName( 'head' )[0].appendChild( link );
			}
		</script>

		<!--[if lt IE 9]>
		<script src="<?php echo URL; ?>/lib/js/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="reveal">

			<!-- Any section element inside of this container is displayed as a slide -->
			<div class="slides">
				<section data-background-color="#7e7e7e" data-background-image="<?php echo URL; ?>/img/there-and-back.png" data-background-size="fit">
					<h1 class="white">WP-to-JS <small>and</small><br>Back Again</h1>
					<h3 class="white">Primer on AJAX and JavaScript with WordPress</h3>
					<p class="white">
						<small>Created by <a href="http://nickpelton.com" class="white">Nick Pelton</a> / <a href="http://twitter.com/nickpelton" class="white">@nickpelton </a></small>
					</p>
				</section>

				<section>
					<h2><a href="http://twitter.com/nickpelton">@nickpelton </a></h2>
					Technology Director at <a href="http://westwerk.com">Westwerk</a> / <a href="http://werkpress.com">WerkPress</a>
					</p>
					<p>I'm a WordPress-focused software developer. I spend most my days developing, planning, and consulting for WordPress-based applications.
					</p>
					<p>I'm also working on my latest startup <a href="http://trackjs.com">{Track:js}</a>,<br> a JavaScript error tracking service.</p>

				</section>


				<section data-background="<?php echo URL; ?>/img/you.png" data-background-size="70%" data-background-repeat="repeat">
					
				<div style="background:rgba(0,0,0,.6); padding:20px;" class="white">
					<h2 class="white">YOU</h2>
					
					<ul>
						<li>Familiar with WordPress and web development.</li>
						<li>Have written some JavaScript – be that <a href="http://jquery.org">jQuery</a>, <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript">vanilla</a>, or just tweaked some open source scripts.</li>
						<li>Love building cool stuff</li>
					</ul>

				</div>
				
				</section>

				<section data-background="<?php echo URL; ?>/img/circle.png" data-background-size="90%">

					<ul>
						<li>How to get data from <strong>WordPress</strong> to <strong>JS</strong></li>
						<li>How to get data from <strong>JS</strong> to <strong>WordPress</strong></li>
						<li>Some demos of tips &amp; tricks</li>
					</ul>

				</section>



					<!-- AJAX section -->
	
					<section>
						<h2>AJAX<br><small>Asynchronous JavaScript and XML</small></h2>

						<p>
							Set of tools to asynchronously communicate with a server <br>in the background without reloading the page.
						</p>

						<img src="<?php echo URL; ?>/img/what.gif"  class="fragment"/>

						

					</section>
					
					<section>

					<h2>Tools we'll be using for AJAX:</h2>
					<ul>
						<li>WordPress</li>
						<li>JavaScript</li>
						<li>jQuery</li>
						<li>HTML</li>
						<li>JSON</li>

					</ul>

				</section>


					<section>

						<h3>Normal page load</h3>
						<img src="<?php echo URL; ?>/img/page-load.png" />
						<small>Synchronous: Rinse &amp; Repeat</small>
					</section>

					<section>

						<h3>What happens during AJAX?</h3>
						<img src="<?php echo URL; ?>/img/ajax.png" />
						<small>Asynchronous: In the background</small>
						
					</section>

						
					<section>
						<h2>Goals of Ajax?</h2>
						<ul>
							<li>Preserving the browser state</li>
							<li>Faster and more responsive applications</li>
							<li>Increase user experience</li>
						</ul>

					</section>
					

					<section>
						<h3>Use case:</h3>
						
						<p>Need new data from WP after page load.</p>
					
						
					</section>

					<section>
						<h3>AJAX with WP</h3>
						<br>
					<ol>
						<li>WP: Tell JS where to find data</li>
						<li>WP: Create the data for JS</li>
						<li>JS: Get data and do something with it</li>
					</ol>


					</section>



					<section>
					<img src="<?php echo URL; ?>/img/prepare.jpg" width="500" />
				</section>


					<section>
						<h3>1. WP: Tell JS where to find data</h3>
						<h4>wp_localize_script();</h4>
						<pre><code>// Enqueue myscript.js
wp_enqueue_script( &quot;myScript&quot;, 'myscript', array(&quot;jquery&quot;), '1.0', true );

// Setup our data
$myDataArray = array(
	'ajax_url' =&gt; admin_url( 'admin-ajax.php' ),
);

// Pass data to myscript.js on page load
wp_localize_script( &quot;myScript&quot;, &quot;myLocalizedData&quot;, $myDataArray );</code></pre>


	

					</section>


					<section>
						<h3>2. WP: Create the data for JS</h3>
						<h4>add_action('wp_ajax_<em>{action_name}</em>', 'callback');</h4>
						
						
<pre><code contenteditable class="php">/**
 * Setup JSON Ajax endpoint for Javascript async access to WP data 
 */

add_action('wp_ajax_my_action_1', 'my_callback_function_1');
add_action('wp_ajax_nopriv_my_action_1', 'my_callback_function_1');

function my_callback_function_1(){

	header('Content-Type: text/html');
	echo '&lt;p&gt;HTML from WP for Javascript&lt;/p&gt;';
	die(); // Prevent WP -1

}</code></pre>

<small><a href="<?php echo DEMOURL; ?>wp-admin/admin-ajax.php?action=my_action_1" target="_blank">Example</a></small>
	
						
					</section>



					<section>
						<h3>3. JS: Get data and do something with it</h3>
						<h4>jQuery $.ajax</h4>
						<pre><code contenteditable class="javascript">// Access WP data using $.ajax()
$.ajax({
	method: &quot;POST&quot;,
	dataType: &quot;html&quot;,
	url: myLocalizedData.ajax_url,
	data: {action:'my_action_1'},

}).done(function(myAjaxData){

 	// Place Data in DOM
  	$('#displayData').append(myAjaxData);

});</code></pre>
						<small><a href="https://gist.github.com/nickpelton/11147744" target="_blank">Gist</a></small><br>
						<small><a href="<?php echo DEMOURL; ?>s3/" target="_blank">Example</a></small>
				</section>


				<section>
					<img src="<?php echo URL; ?>/img/mind_blown.gif" width="500" />
				</section>


			<section>
				
						<h3>AJAX with WP: Loading posts</h3>
						<br>
					<ol>
						<li>WP: Tell JS where to find data</li>
						<li>WP: Create the data for JS</li>
						<li>JS: Get data and do something with it</li>
						
					</ol>
					<div>
					
					</div>

			</section>


			<section>
						<h3>1. WP: Tell JS where to find data</h3>
						<h4>wp_localize_script();</h4>
						<pre><code>// Enqueue myscript.js
wp_enqueue_script( &quot;myScript&quot;, 'myscript', array(&quot;jquery&quot;), '1.0', true );

// Setup our data
$myDataArray = array(
	'ajax_url' =&gt; admin_url( 'admin-ajax.php' ),
);

// Pass data to myscript.js on page load
wp_localize_script( &quot;myScript&quot;, &quot;myLocalizedData&quot;, $myDataArray );</code></pre>

			</section>

			<section>
				<h3>2. WP: Create the data for JS</h3>
				<h4>add_action('wp_ajax_<em>{action_name}</em>', 'callback');</h4>
				<pre><code>add_action('wp_ajax_load_posts', 'load_post_callback');
add_action('wp_ajax_nopriv_load_posts', 'load_post_callback');

function load_post_callback(){

	// Get some data from WP
	$args = array(
		'post_type'=&gt;'post',
		'posts_per_page' =&gt; 3
	);
	$posts_array = get_posts($args);

	// Return data as JSON string
	wp_send_json($posts_array);
}</code></pre>

			</section>


			<section>
						<h3>3. JS: Get data and do something with it</h3>
						<h4>jQuery $.ajax</h4>
						<pre><code class="javascript">$.ajax({
	method: &quot;POST&quot;,
	dataType: &quot;JSON&quot;,
	url: myLocalizedData.ajax_url,
	data: {action:&quot;load_posts&quot;},

}).done(function(myAjaxData){

	html = &quot;&quot;;
  	$.each(myAjaxData,function(index,value){
	html+=&quot;&lt;h3&gt;&quot;+value.post_title+&quot;&lt;/h3&gt;&lt;br&gt;&quot;;
	html+=&quot;&lt;div&gt;&quot;+value.post_content+&quot;&lt;/div&gt;&lt;br&gt;&lt;br&gt;&quot;;
  	});
  	$('#displayData').append(html); // Note one insert
});</code></pre>
						<small><a href="https://gist.github.com/nickpelton/11327034" target="_blank">Gist</a></small><br>
						<small><a href="<?php echo DEMOURL; ?>s4" target="_blank">Example</a></small>
				</section>

			<section data-background="<?php echo URL; ?>/img/circle.png" data-background-size="90%">

					<ul>
						<li><del>How to get data from <strong>WordPress</strong> to <strong>JS</strong></del></li>
						<li>How to get data from <strong>JS</strong> to <strong>WordPress</strong></li>
						<li>Tip &amp; Tricks</li>
					</ul>

				</section>


			<section>
						
						<h3>Use case:</h3>
						
						<p>User event creates new data, we want to save it.</p>
						

						
					</section>



			<section>
				
						<h3>JS-to-WP: Saving data</h3>
						<br>
					<ol>
						<li>WP: Tell JS where to send data</li>
						<li>WP: Create action to capture data</li>
						<li>JS: AJAX send data to server</li>
						
					</ol>
					<div>
					<br>
					
					</div>

			</section>


			<section>
						<h3>1. WP: Tell JS where to send data</h3>
						<h4>wp_localize_script();</h4>
						<pre><code>// Enqueue myscript.js
wp_enqueue_script( &quot;myScript&quot;, 'myscript.js', array(&quot;jquery&quot;), '1.0', true );

// Setup our data
$myDataArray = array(
	'ajax_url' =&gt; admin_url( 'admin-ajax.php' ),
);

// Pass data to myscript.js on page load
wp_localize_script( &quot;myScript&quot;, &quot;myLocalizedData&quot;, $myDataArray );</code></pre>


	

					</section>

			<section>
				<h3>2. WP: Create action to capture data</h3>
				<h4>add_action('wp_ajax_<em>{action_name}</em>', 'callback');</h4>
				<pre><code>add_action('wp_ajax_save_votes', 'save_votes_callback_function'); 
add_action('wp_ajax_nopriv_save_votes', 'save_votes_callback_function');

function save_votes_callback_function(){

	// Set values
	$votes = $_POST['vote'];
	$current_votes = get_option('ww_votes');
	if(!$current_votes){ $current_votes = 0; }
		
	// Add votes
	$current_votes += (int) $votes;

	// Update DB
	update_option('ww_votes',$current_votes);

	// Return true in JSON
	wp_send_json_success($current_votes);

}</code></pre>

			</section>


			<section>
						<h3>3. AJAX send data to server</h3>
						<h4>jQuery $.ajax</h4>
						<pre><code class="javascript">$.ajax({
	method: "POST",
	dataType: "JSON",
	url: myLocalizedData.ajax_url,
	data: {action:'save_votes',vote:1},

}).done(function(myAjaxData){ 

  	// Place Data in DOM
  	$('.votes').html(myAjaxData.data);
  	$('#displayData').append("Status: "+myAjaxData.success+", value: "+myAjaxData.data+"<br>");

});</code></pre>
						<small><a href="https://gist.github.com/nickpelton/8b269b463112ebf74a3c" target="_blank">Gist</a></small><br>
						<small><a href="<?php echo DEMOURL; ?>s5/" target="_blank">Example</a></small>
				</section>

			


			<section>
					<img src="<?php echo URL; ?>/img/amaze.gif" width="500" />
				</section>



				<section data-background="<?php echo URL; ?>/img/circle.png" data-background-size="90%">

					<ul>
						<li><del>How to get data from <strong>WordPress</strong> to <strong>JS</strong></del></li>
						<li><del>How to get data from <strong>JS</strong> to <strong>WordPress</strong></del></li>
						<li>Tip &amp; Tricks</li>
					</ul>

				</section>







				<section>
				
						<h3>AJAX Security</h3>
						<br>
						<ul>
						<li>Sanitize all inputs</li>
						</ul>
						
					<div>
					
					</div>

			</section>

			<section>
				
						<h3>AJAX Security</h3>
						<br>
						<ul>
						<li>Use Nonce</li>
						<ul>
							<li>Nonce: Number Once</li>
							<li>Used Verify AJAX calls</li>
							<li>Expires after a timeframe</li>
							
						</ul>
						</ul>
					<div>
					<br>
					
					</div>

			</section>


			<section>
						<h3>WP: Create and localize a Nonce</h3>
						<h4>wp_create_nonce($secretString);</h4>
						<pre><code>// Enqueue myscript.js
wp_enqueue_script( &quot;myScript&quot;, 'myscript.js', array(&quot;jquery&quot;), '1.0', true );

// Setup our data
$myDataArray = array(
	'ajax_url' =&gt; admin_url( 'admin-ajax.php' ),
	'ajax_nonce' => wp_create_nonce( 'my-secret-string' )
);

// Pass data to myscript.js on page load
wp_localize_script( &quot;myScript&quot;, &quot;myLocalizedData&quot;, $myDataArray );</code></pre>


	

					</section>

			<section>
						<h3>Get Nonce from Localized data,<br>send with AJAX calls</h3>
						
						<pre><code class="javascript">$.ajax({
	method: "POST",
	dataType: "JSON",
	url: myLocalizedData.ajax_url,
	data: {
	action:'secure_enpoint',
	security: myLocalizedData.ajax_nonce
	},

}).done(function(myAjaxData){ 

  	
  	// Place Data in DOM
	$('#displayData').append('Status: '+myAjaxData.success);

});</code></pre>
						
				</section>

			<section>
				<h3>Validate Nonce</h3>
				<h4>check_ajax_referer($secretString,$name)</h4>
				<pre><code>add_action('wp_ajax_secure_endpoint', 'secure_endpoint_callback_function');

function secure_endpoint_callback_function(){

	// Nonce Security check
	check_ajax_referer( 'my-secret-string', 'security' );

	echo "You have access!";

}
</code></pre>
		<small><a href="https://gist.github.com/nickpelton/11327670" target="_blank">Gist</a></small><br>
						<small><a href="<?php echo DEMOURL; ?>s9/" target="_blank">Example</a></small>
			</section>


			



			<section>
				
						<h3><strong>Asynchronous</strong> nature of AJAX</h3>
						<br>
						<ol>
						<li>Asynchronous means “Not in Sync”.</li>
						<li>Each AJAX call is independent and can come back at any time.</li>
						<li>This can cause unexpected errors in your logic</li>
						</ol>
					<div>
					<br>
					<small><a href="<?php echo DEMOURL; ?>s6" target="_blank">Example</a></small>
					</div>

			</section>


			<section>
				
						<h3>One Solution</h3>
						<br>
						<ol>
						<li>Disable UI</li>
						<li>Show a spinner</li>
						<li>Re-endable UI on $.ajax.done();</li>
						</ol>
					<div>
					<br>
					<small><a href="<?php echo DEMOURL; ?>s7" target="_blank">Example</a></small>
					</div>

			</section>
			

			<section>
				
						<h3>Another Solution</h3>
						<br>
						<ol>
							<li>Move logic to JS, do it instantly</li>
							<li>Sync data in the background</li>
						</ol>
					<div>
					<br>
					<small><a href="<?php echo DEMOURL; ?>s8" target="_blank">Example</a></small>
					</div>

			</section>

			<section>
				
						<h3>Other Common AJAX issues</h3>
						<br>
						<ul>
							<li>Cross domain AJAX doesn't work (jsonp,CORS,proxy)</li>
							<li>SEO doesn't always understand it (History API, progressivly enhance)</li>
							
						</ul>
					<div>
					</div>

			</section>



			<section>
						<h2>AJAX Examples</h2>

						
						<div style="margin:30px 0 0 0;">
							
							<ul>
								<li>Load more posts without reload (IE: Infinite Scroll)</li>
								<li>Live search filter</li>
								<li>Track statistics</li>
								<li>WordPress Media Library (3.0+)</li>
								<li>Automate a Foosball table (We did this!)
								
							</ul>
						</div>
						

					</section>


			<section>
					<img src="<?php echo URL; ?>/img/allthethings.jpg" width="500" />
			</section>


			<section>
					<h2>Thanks! Questions?</h2>
					<br>
					<h5>Nick Pelton</h5>
					<h5><a href="http://twitter.com/nickpelton">@nickpelton </a></h5>
					<a href="http://westwerk.com">Westwerk</a> / <a href="http://werkpress.com">WerkPress</a><br>
					<a href="http://trackjs.com">{Track:js}</a>

					
			</section>

		
			</div>

		</div>

		<script src="<?php echo URL; ?>/lib/js/head.min.js"></script>
		<script src="<?php echo URL; ?>/js/reveal.min.js"></script>

		<script>

			// Full list of configuration options available here:
			// https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
				controls: true,
				progress: true,
				history: true,
				center: true,

				theme: Reveal.getQueryHash().theme, // available themes are in /css/theme
				transition: Reveal.getQueryHash().transition || 'default', // default/cube/page/concave/zoom/linear/fade/none

				// Parallax scrolling
				// parallaxBackgroundImage: 'https://s3.amazonaws.com/hakim-static/reveal-js/reveal-parallax-1.jpg',
				// parallaxBackgroundSize: '2100px 900px',

				// Optional libraries used to extend on reveal.js
				dependencies: [
					{ src: '<?php echo URL; ?>/lib/js/classList.js', condition: function() { return !document.body.classList; } },
					//{ src: 'plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					//{ src: 'plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
					{ src: '<?php echo URL; ?>/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
					{ src: '<?php echo URL; ?>/plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } },
					// { src: 'plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }
				]
			});

		</script>

	</body>
</html>
