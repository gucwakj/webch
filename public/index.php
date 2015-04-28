<html>

<head>
	<title>Web Based Computing in Ch/C/C++</title>

	<script type="text/javascript" src="https://cdn.socket.io/socket.io-1.3.4.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script type="text/javascript" src='js/jquery.ba-hashchange.min.js'></script>
	<script type="text/javascript" src='js/dynamicpage.js'></script>
	<script type="text/javascript" src="js/edit_area/edit_area_full.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext">

	<!-- EDIT AREA -->
	<script language="javascript" type="text/javascript">
		editAreaLoader.init({
			id: "programcode"			// textarea id
			,syntax: "cpp"				// syntax to be uses for highlighting
			,start_highlight: true		// to display with highlight mode on start-up
			,allow_toggle: false
			,toolbar: "search, fullscreen, |, undo, redo, |, select_font"
			,font_size: 12
			,cursor_position: "auto"
		});
	</script>

	<!--Menu-->
	<script language="javascript" type="text/javascript">
		$(document).ready(function () {
			$('.nav li').hover(function () {	//appearing on hover
				$('ul', this).fadeIn();
			}, function () {					//disappearing on hover
				$('ul', this).fadeOut();
			});
		});
	</script>

	<!--SocketIO-->
	<script language="javascript" type="text/javascript">
		var socket = io.connect("http://169.237.108.168:8080");

		$(function () {
			socket.on("cmd", function(data) {
				// add to output box
				$("#output").append('<span id="inputfont" style="font-weight:900;"><i>' + data.input + '</i></span><br>');
				// scroll to bottom of box
				var e = document.getElementById("wrapper");
				e.scrollTop = e.scrollHeight;
			});

			socket.on("response", function(data) {
				// add to output box
				data.msg = data.msg.replace(/\n/g, '<br>');
				$("#output").append(data.msg);
				// scroll to bottom of box
				var e = document.getElementById("wrapper");
				e.scrollTop = e.scrollHeight;
			});

			socket.on("image", function(data) {
				var ctx = document.getElementById('canvas').getContext('2d');
				socket.on("image", function(info) {
					var img_buffer = document.createElement('img');
					img_buffer.src = 'data:image/jpeg;base64,' + info.buffer;
					img_buffer.onload = function() {
						var imgWidth = img_buffer.width;
						var imgHeight = img_buffer.height;
						ctx.width = imgWidth;
						ctx.height = imgHeight;
						ctx.drawImage(img_buffer, 0, 0, imgWidth, imgHeight);
					}
				});
				$("#dialog-message").dialog("open");
			});
		});

		function submitEvent(field, e) {
			var keycode;
			if (window.event) keycode = window.event.keyCode;
			else if (e) keycode = e.which;
			else return true;

			if (keycode == 13) {
				console.log('hello'); 
				console.log($("msg").val());
				socket.emit("clientMsg", {
					"input": $("#msg").val(),
					"msg": ''
				});
				document.getElementById('msg').value = "";
				return false;
			}
			else
				return true;
		};

		var idleTime = 0;
		$(document).ready(function () {
			//Increment the idle time counter every 30 minutes.
			var idleInterval = setInterval(timerIncrement, 30*1000*60); // 30 minutes

			//Zero the idle timer on mouse movement.
			$(this).mousemove(function (e) {
				idleTime = 0;
			});
			$(this).keypress(function (e) {
				idleTime = 0;
			});
		});

		function timerIncrement() {
			idleTime = idleTime + 1;
			if (idleTime >= 1) {
				alert('Your session has expired! Please refresh');
				socket.emit("clientMsg", {
					"msg": '',
					"input": '',
					"killSignal": 'endall'
				});
			}
		}
	</script>
</head>

<body>
	<header>
		<h2 id="titleblock">Web Based Computing in Ch/C/C++</h2>
	</header>

	<div id="lessonPlanContainer" class="clearfix:after">
		<div id="lessonPlan">
			<div id="guts">
				<div class="navigation">
					<ul class="nav">
						<li  id="both" class="lessonPlanNavLink" onclick= "lessonLink('index.php')">Home
					</ul>
				</div>
				<h3> Computer programming in C </h3>
				<p>This course will be a general introduction to programming in C. The various courses will teach you most of the different aspects of C programming.</p>
				<p>
					<a class="lessonPlanNavLink" onclick= "lessonLink('lessons/ch1L1.php')">
					<h4 class="courseLink">Course 1: Basic C programming</h4>
					</a>
					<a class="lessonPlanNavLink" onclick= "lessonLink('lessons/ch2L1.php')">
					<h4 class="courseLink">Course 2: Math with C</h4>
					</a>
					<h4>Course 3: Title Here</h4>
				</p>
			</div>
		</div>
	</div>

	<div id="userInterface" class="clearfix:after">
		<div id="textareaHeader">
			<p>Enter your code below:</p>
		</div>
		<textarea name="programcode" id="programcode" rows=20></textarea>

		<div id="controlPanel">
			<input type="submit" id="submit" class="userButtons" value="Run" name="runCode" onclick="submit()" />
			<input type="submit" id="kill" class="userButtons" value="Stop" onclick="kill()" />
		</div>

		<div id="dialog-message" title="C Plot">
			<canvas width="639" height="507" id="canvas" alt="plot"></canvas>
		 </div>

		<div class="clear"></div>

		<div id=wrapper>
			<div id="msgBox">
				<div id="output"></div>
				<input type="text" id="msg" onkeypress="submitEvent(this,event)" autofocus/>
			</div>
		</div>
	</div>

	<div style="clear:both;">
		<div id='foot' class="clear">
			<a id='IELlink' class='footlinks' href="http://iel.ucdavis.edu/" target="_blank">Integration Engineering Laboratory, UC Davis</a>
			<a id='CSTEMlink' class='footlinks' href="http://c-stem.ucdavis.edu/" target="_blank"><img id="cstemLogo" src="./images/C-Stem-Logo-small.png" /></a>
			<div id='contactCSTEM'> Copyright &copy; 2015 UC Davis C-STEM Center | <a href="http://c-stem.ucdavis.edu/contact-us/">Contact Us</a></div>
		</div>
	</div>

	<script type="text/javascript">
		function submit() {
		  var programcode = editAreaLoader.getValue('programcode');
		  document.getElementById('output').innerHTML = '';
		  $('#msg').focus();
		  document.getElementById('msg').value = '';
		  socket.emit("clientMsg", {
		"msg": programcode,
		"input": '',
		"killSignal": ''
		});
		}
		
		function kill() {
		  socket.emit("clientMsg", {
		"msg": '',
		"input": '',
		"killSignal": 'endscript'
		});
		}
		
		$('#menuIcon').on('click', function() {
		$('.slide-menu').toggleClass('clicked');
		});
		
		$('.close-menu').on('click', function() {
		$('.slide-menu').toggleClass('clicked');
		});
		
		$('.slide-menu li a').on('click', function() {
		$('.slide-menu').toggleClass('clicked');
		});
		
		$('.slide-menu').height($(document).height());
		
		function lessonForward() {
		lessonPlan = document.getElementById("lessonPlan");
		lessonPlan.innerHTML = "<p><b><i>Lesson 1: Hello World</i></b></p>";
		}
		
		function setSelectionRange(input, selectionStart, selectionEnd) {
		if (input.setSelectionRange) {
			input.focus();
			input.setSelectionRange(selectionStart, selectionEnd);
		}
		else if (input.createTextRange) {
			var range = input.createTextRange();
			range.collapse(true);
			range.moveEnd('character', selectionEnd);
			range.moveStart('character', selectionStart);
			range.select();
		}
		}

		function setCaretToPos (input, pos) {
		setSelectionRange(input, pos, pos);
		}
		function textareaFocus(){
		//setCaretToPos(document.getElementById("programcode"), 50);
		}
		function lessonLink(lessonlink){
		window.location.hash = lessonlink;
		}
		$("#dialog-message").dialog({ 
		autoOpen: false,
		position: {my: "center center", at:"center center", of: window},
		modal: true,
		height: 575,
		width: 675
		});
		$("#plot").click(function() {
		$("#dialog-message").dialog("open");
		});
	</script>
</body>

</html>

