<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <title><?php echo CHtml::encode(Yii::app()->name).' | Admin';?></title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<noscript>
			<div id="noscript">
				Please, enable javascript in your browser
			</div>
		</noscript>
		  
		<div id="wrapper">
			<header id="header">
				<nav id="nav" class="clearfix">
					<ul>
						<li id="save"><a href="#">save</a></li>
						<li id="load"><a href="#">load</a></li>
						<li id="from_html"><a href="#">from html</a></li>
						<li id="rect"><a href="#">rectangle</a></li>
						<li id="circle"><a href="#">circle</a></li>
						<li id="polygon"><a href="#">polygon</a></li>
						<li id="edit"><a href="#">edit</a></li>
						<li id="to_html"><a href="#">to html</a></li>
						<li id="preview"><a href="#">preview</a></li>
						<li id="clear"><a href="#">clear</a></li>
						<li id="new_image"><a href="#">new image</a></li>
						<li id="show_help"><a href="#">?</a></li>
					</ul>
				</nav>
				<div id="coords"></div>
				<div id="debug"></div>
			</header>	
			<div id="image_wrapper">
				<div id="image">
					<img src="" alt="#" id="img" />
					<svg xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" id="svg"></svg>
				</div>
			</div>
		</div>

		<!-- For html image map code -->
		<div id="code">
			<span class="close_button" title="close"></span>
			<div id="code_content"></div>
		</div>

		<!-- Edit details block -->
		<form id="edit_details">
			<h5>Attrubutes</h5>
			<span class="close_button" title="close"></span>
			<p>
				<label for="href_attr">href</label>
				<input type="text" id="href_attr" />
			</p>
			<p>
				<label for="alt_attr">alt</label>
				<input type="text" id="alt_attr" />
			</p>
			<p>
				<label for="title_attr">title</label>
				<input type="text" id="title_attr" />
			</p>
			<button id="save_details">Save</button>
		</form>

		<!-- From html block -->
		<div id="from_html_wrapper">
			<form id="from_html_form">
				<h5>Loading areas</h5>
				<span class="close_button" title="close"></span>
				<p>
					<label for="code_input">Enter your html code:</label>
					<textarea id="code_input"></textarea>
				</p>
				<button id="load_code_button">Load</button>
			</form>
		</div>
		  
		<!-- Get image form -->
		<div id="get_image_wrapper">
			<div id="get_image">
				<div id="logo_get_image">
				</div>
				<div id="loading">Loading</div>
				<div id="file_reader_support">
					<label>Drag an image</label>
					<div id="dropzone">
						<span class="clear_button" title="clear">x</span> 
						<img src="" alt="preview" id="sm_img" />
					</div>
					<b>or</b>
				</div>
				<label for="url">type a url</label>
				<span id="url_wrapper">
					<span class="clear_button" title="clear">x</span>
					<input type="text" id="url" />
				</span>
				<button id="button">OK</button>
			</div>
		</div>
		<?php echo $content;?>
		<!-- Help block -->
		<div id="overlay"></div>
		<div id="help">
			<span class="close_button" title="close"></span>
			<div class="txt">
				<section>
					<h2>Main</h2>
					<p><span class="key">F5</span> &mdash; reload the page and display the form for loading image again</p>
					<p><span class="key">s</span> &mdash; save map params in localStorage</p>
				</section>
				<section>
					<h2>Drawing mode (rectangle / circle / polygon)</h2>
					<p><span class="key">ENTER</span> &mdash; stop polygon drawing (or click on first helper)</p>
					<p><span class="key">ESC</span> &mdash; cancel drawing of a new area</p>
					<p><span class="key">SHIFT</span> &mdash; square drawing in case of a rectangle and right angle drawing in case of a polygon</p>
				</section>
				<section>
				<h2>Editing mode</h2>
					<p><span class="key">DELETE</span> &mdash; remove a selected area</p>
					<p><span class="key">ESC</span> &mdash; cancel editing of a selected area</p>
					<p><span class="key">SHIFT</span> &mdash; edit and save proportions for rectangle</p>
					<p><span class="key">i</span> &mdash; edit attributes of a selected area (or dblclick on an area)</p>
					<p><span class="key">&uarr;</span> &mdash; move a selected area up</p>
					<p><span class="key">&darr;</span> &mdash; move a selected area down</p>
					<p><span class="key">&larr;</span> &mdash; move a selected area to the left</p>
					<p><span class="key">&rarr;</span> &mdash; move a selected area to the right</p>
				</section>
			</div>
			<footer>
				<a href="http://github.com/summerstyle/summer">Summer html image map creator 0.5</a><br />
				&copy; 2013 Vera Lobatcheva<br />
				GPL3 License
			</footer>
		</div>

	</body>
</html>