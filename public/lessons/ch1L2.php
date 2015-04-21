<div id="lessonPlan">
    <?php $pageName = "2"; ?>
             <?php include 'ch1M.php'; ?>
    <div class="lesson"> 
		    <h3>Lesson 2: The <code class="keywords2">scanf</code>() Function </h3>
		    <p>Now that you know how to print statements to the user, we can move on to collecting information from the user.
		    <p>In order to record a user input, we use the <code class="keywords2">scanf</code>() function. First we declare a variable as shown below:</p>
			    
			    <code>&nbsp;&nbsp;&nbsp;<span class="types">string_t</span> answer;</code>

		    <p>Note that <code class="types">string_t</code> represents the data type (in this case a string of characters that form a word or group of words).</p>
		    <p>Next, you use the function <code class="keywords2">scanf</code>() to store the user input into the variable you declared.</p>

			   <code><span class="keywords2">scanf</span>(<span class="quotesmarks">"%s"</span>, &answer);</code>

		    <p>The <code>s</code> after the percent sign tells the program it will record a string value. 
		    Lastly, you can print back that stored input as shown </p> 

			    <code><span class="keywords2">printf</span>(<span class="quotesmarks">"Hello %s\n"</span>, answer);</code>
		    <p>Now you try. Type the following code into the coding area and hit "Run". You'll find that the computer will request your  name. Type it in and hit &lt;ENTER&gt; to see the results!</p>

			    <code><pre>
<span class="types">string_t</span> answer;

<span class="keywords2">printf</span>("Please type your name: ");
<span class="keyword2">scanf</span>("%s", &answer);
<span class="keywords2">printf</span>("Hello %s, what a lovely name you have!\n", answer);
			    </pre></code> 
		</div>
	    </div>
	    </div>
