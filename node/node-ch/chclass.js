var util = require('util');
var spawn = require('child_process').spawn;
var cmd,  datastr, i, tempdata;

module.exports = function chclass() {
	this.ch = new spawn('chs',['-u', '-r']);
	var ch = this.ch;
	this.processid = this.ch.pid;
	var chScript = this.chScript;
	var cmdQueue = [];
	var socketResponse;
	
	this.shell = function(command, callback) {
		socketResponse = callback;
		if (chScript) chScript.kill();
		i = 0;  //loop index variable, how many times have we sent data back to client
        if (command.charAt[command.length-1]!='\n')  command += '\n';
        console.log('COMMAND: ', command);
		cmdQueue = [];
		cmdQueue.push({'command':command, 'pid': '', 'data': '', state: 'pending'});  //initialize the cmdQueue by adding the initial script.ch command, only time the cmdQueue member state is 'pending'
		processQueue();
	};

	function processQueue() {
        
		if (cmdQueue.length > 0 && cmdQueue[0].state === 'pending') {  //Initial cmdQueue, sends script.ch command to the ch process
            
			cmdQueue[0].state = 'processingscript';  //once the 'script.ch' command is sent to the Ch child, change state to 'processing'
            chScript = spawn('chs',[cmdQueue[0].command]);
			cmdQueue[0].pid = chScript.pid;
			
			chScript.stdout.on('data', function(data) {
				datastr = data.toString('utf8');
				if (i>0 && datastr !== '') {//if the data output from the last iteration still exists but has not yet been sent to client window (ensures any new data will output if two back-to-back printf statements send data back at different times)...
				
				    //add a cmdQueue member to make sure that data gets sent back to the client before any stdin is requested
				    cmdQueue.push({'command':'', 'pid': chScript.pid, 'data': '', state: 'processingmoredata'});  
				
				}
				
				/* FORMAT THE DATA STRING - REMOVE ANY STRINGS INCLUDING CH COMMAND */
				if (cmdQueue.length > 0) {  //if the cmdQueue has any members
					var idx = datastr.indexOf(cmdQueue[0].command);   //get index of command in datastr
					if (idx != -1)                          //if command is in datastr...
						datastr = datastr.substr(idx + cmdQueue[0].command.length);  //then datastr is set to index after command string to remove the command string from the output
                    console.log('dataStr: ' + datastr);
					datastr = datastr.replace(/safech>/g, '');  //replace any safech prompt in the datastr
					datastr = datastr.replace(/chs .\/script.ch/g, '');  //replace any 'chs ./script.ch' in the datastr
					datastr = datastr.replace('/home/www_webch/chWebShell> ', '');  //replaces ch prompt (directory dependent, hard coded at the moment)
                    //datastr = datastr.replace(/plot\.outputType.*/i,'');
                    //datastr = datastr.replace(/plot\.plotting.*/i,'plot.outputType(PLOT_OUTPUTTYPE_FILE, "png", "/var/www/html/webch/chWebShell/plotdemo3_10_15.png");plot.plotting();');
                    datastr = datastr.replace('exit\n', '');  //makes it so that if the user types 'exit' as an input, the ch process will not exit (don't need now that the stdin sends to chs ./script process, not the chs shell)
                /* SEND THE DATASTR TO CMDQUEUE[0].DATA AND OUTPUT THE DATA TO CALLBACK */
					cmdQueue[0].data += datastr; //set the first cmdQueue member's data to our formatted datastr
					cmd = cmdQueue[0];             // cmd is set to the first member of cmdQueue
					if (cmd && datastr.length > '1') {   //if there is some data to output
						if (undefined != typeof socketResponse) { //if the callback is not undefined
							console.log('cmdQueue' + cmdQueue);
                            console.log('cmdData' + cmd.data);
							socketResponse("0", cmd.data);  //send response to client window
							i++; //increment i to show that data has been outputted
							cmdQueue.shift();  //delete the first member of cmdQueue
							//processQueue();
						}
					}
				}
			});

			chScript.stderr.on('data', function(data) {
			console.log('error1: ' + data);
			data = data.toString('utf8');
			
			/* Remove the script file name from showing in error message */
			bindex = data.indexOf("\'\/var\/");  //find the index of beginning of script file name
			eindex = data.lastIndexOf(".ch'");  //find the index of end of script file name
			console.log('bindex: ' + bindex + 'eindex is: ' + eindex);
			console.log('from eindex is: ' + data.substring(eindex)); 
			if (bindex >= 0 && eindex >= 0) {    //If the file name indices were found in data string
			script_filename = data.substring(bindex, eindex + ".ch'".length); //get the file name substring
            data = data.replace(script_filename, ''); //and remove the file name substring
			}
			
			/* Fix the line number problem in error message (due to added setbuf line in script file) */
			errorSubstring = "before or at line "; //use this string to find where the line number is reported in error message 
			num = errorSubstring.length;  
			if (data.indexOf(errorSubstring) >= 0) {
			      lineNumIndex = data.indexOf(errorSubstring) + num; //if line number exists, get index of line number character
			      lineNum = Number(data.charAt(lineNumIndex)) - 1; // subtract 1 line from line number
			      console.log('lineNum = ' + lineNum);
			      data = data.substring(0, lineNumIndex) + lineNum + data.substring(lineNumIndex + 1);  //replace the line number with the new line number
			}
			
			/* Remove extra error message info not needed */
			data = data.replace(' in file', '');
			data = data.replace('ERROR: cannot execute command', '');
			bindex = data.indexOf("ERROR: command '");
			notFoundStr = "' not found\n";
			eindex = data.indexOf(notFoundStr);
			if (bindex >= 0 && eindex >= 0) {
			    subStr = data.substring(bindex, eindex + notFoundStr.length);
			    data = data.replace(subStr, '');
			}
			
			socketResponse("1", data);
			
			
			});

			chScript.on('exit', function(code) {
				console.log('child process exited with code ' + code);
				console.log('chScript after exit is: ' + chScript);
				//process.exit();
			});

		}
		
		if (i>0 && cmdQueue.length > 0 &&  cmdQueue[0].data === ''){ //If there is no data left to output, but still a member in the cmdQueue, shift cmdQueue to reduce the queue
			cmdQueue.shift();  //delete a cmdQueue member
		} 
	};
	
	ch.on('exit', function(code) {
		console.log('child process exited with code ' + code);
		console.log('chs shell after exit is: ' + ch);
	});

	this.writeInputVal = function (userinput) {
		if (chScript !== undefined) {
		    if (cmdQueue.length < 1) {
		    cmdQueue.push({'command':'', 'pid': chScript.pid, 'data': '', state: 'processingstdin'});  //add a cmdQueue member for reporting back response data after writing an input to stdin
		    }
		    if (userinput.charAt[userinput.length-1]!='\n') userinput += '\n';
		    chScript.stdin.write(userinput);	
		    processQueue();
		}
	};
	
	this.endscript = function(){
		if (chScript !== undefined) chScript.kill(); //kills the chs script program if the script is still exists (is running)
	};

	this.endall = function (){
		this.endscript();
		if (ch !== undefined) console.log('Console Log 6: Process #' + ch.pid + ' was killed due to idle time or user kill switch');
		if (ch !== undefined) ch.kill(); //kills the chs shell
	};
}



