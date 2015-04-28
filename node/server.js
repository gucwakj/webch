// initialize variables
var chs = [];
var chclass = require("./node-ch/chclass");
var fs = require("fs");
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var clientId;
var clientCount = 0;
var plot = -1;
var cluster = require('cluster');
var numCPUs = require('os').cpus().length;

// start listening server
app.get('/', function(req, res){
  res.send('<h1>Hello world</h1>');
});
http.listen(8080);

// wait for user to connect
io.sockets.on('connection', function (socket) {
	chs[socket.id] = {'chchild': new chclass, 'socket': socket, 'processid': '', 'scriptPID': ''};
	clientId = socket.id;
	clientCount++;
	console.log('# of clients logged on: ' + clientCount);
	console.log('The client\'s ID is: ' + clientId);
	chs[socket.id].processid = chs[socket.id].chchild.processid;
	console.log('socket.id: ' + socket.id + ' || Process Id: ' + chs[socket.id].processid);

	// data from the user
	socket.on("clientMsg", function(data) {
		socket.emit("cmd", data);

		/* WRITE THE DATA IN HTML TEXTAREA TO A SCRIPT FILE, USE CH.JS TO RUN SCRIPT */
		if (data.msg !== undefined && data.msg !== '') {   //when user inputs code script..
			console.log('data.msg1:' + data.msg);

			data.msg = data.msg.replace(/plot\.outputType.*/ig,'');
			data.msg = data.msg.replace(/plot\.plotting.*/i,'plot.outputType(PLOT_OUTPUTTYPE_FILE, "png", "/home/www_webch/chWebShell/plot_'+socket.id+'.png"); plot.plotting();');
			plot = data.msg.search(/plot\.plotting.*/i);
			console.log('data.msg2:' + data.msg);
			data.msg = 'setbuf(_stdout, NULL); \n' + data.msg;
			fs.writeFile('script_' + socket.id + '.ch', data.msg, function (err) {       //writes data from textarea into a file called script.ch
				if (err) throw err;
				//console.log('You wrote to file: ' + data.msg);
			});
			chs[socket.id].chchild.shell('./script_' + socket.id + '.ch', function callback(err, out) {   //initialize ch.js, send 'chs ./script.ch' command over
				console.log('1');
				chs[socket.id].socket.emit("response", {
					"msg": out
				});
				if (plot > -1) {
					socket.emit("response",{"msg": 'Please wait while the plot loads...'})
					setTimeout(function() { /*This needs a different solution. this should only be used as a temporary workaround. It essentially delays sending the plot image for tthe time below becuase the image generation is a slow process.*/
						console.log('2: /home/www_webch/chWebShell/plot_' + socket.id + '.png');
						fs.readFile('/home/www_webch/chWebShell/plot_' + socket.id + '.png', function(err, buf) {
							if (err) throw err;
							socket.emit('image', { image: true, buffer: buf.toString('base64') });
						});
					}, 2000); /*Delay time. if the graph isnt showing this can be increased.*/
				}
			});
		}

		/* TAKE STDIN INPUT WHEN RUNNING SCRIPT FILE */
		if (data.input !== undefined && data.input !== '' && chs[socket.id].chScript) {
			chs[socket.id].chchild.writeInputVal(data.input);
		}

		/* METHOD TO DELETE THE SCRIPT FILE AND KILL CH PROCESS */
		if (data.input == '' && data.msg == '' && data.killSignal == 'endscript') {
		  fs.unlink('script_' + socket.id + '.ch', function() {
				console.log('Script file has been unlinked');
				chs[socket.id].chchild.endscript();
				 });
		}

		/* METHOD TO KILL IF IDLE TIMEOUT IS REACHED */
		if (data.input == '' && data.msg == '' && data.killSignal == 'endall') {
			fs.unlink('script_' + socket.id + '.ch', function() {
				console.log('Script file has been unlinked');
				chs[socket.id].chchild.endall();
			});
		}
	});

	// clean up server
	socket.on('disconnect', function () {
		console.log('A client has closed their browser');
		clientCount--;
		console.log('client count is ' + clientCount);
		fs.exists('script_' + socket.id + '.ch', function(exists){
			fs.exists('plot_' + socket.id + '.png', function(exists){
				fs.unlink('plot_' + socket.id + '.png', function() {
					console.log('plot file has been unlinked');
				});
			});
			fs.unlink('script_' + socket.id + '.ch', function() {
				console.log('Script file has been unlinked');
				chs[socket.id].chchild.endall();
			});
		});
	});
});

