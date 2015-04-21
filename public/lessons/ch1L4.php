
	    <div id="lessonPlan">
<?php $pageName = "4"; ?>
            <?php include 'ch1M.php'; ?>
            <div class="lesson"> 
			<h3>Lesson 4: While loops</h3> 
			<p>Sometimes, you want the program to react to different user inputs or conditions. In those situations, you would use a loop function<br>
			that will execute you code continually until some predetermined condition is met. for instance:</p>
				<blockquote><code>
				<p><span class="types">string_t</span> response=<span class="quotesmarks">"yes"</span>; <span class="comments">//declare a string named "response" as corresponding to a string value of "yes"</span><br><br> 

				while(response=="yes"){	<br>
					<span class="comments">//some code</span><br>
				} </p>
				</code></blockquote>
			<p>will continually execute the code within the brackets until the string "response" changes value to something other than "yes".</p> 
			<p>Using a while loop, along with <code class="keywords2">printf</code>() and <code class="keywords2">scanf</code>() functions, write a program that will ask about how a user is feeling and why they<br>
			are feeling that way. At the end of that conversation, ask the user if they want to keep talking about their feelings. If they say<br>
			yes, then the program executes again. If they say no, have the program say goodbye to the user.</p> 
			
			<p>Sample Conversation:</p>
			<blockquote>
			<p>
				How are you feeling?<br>
				//program scans input<br>
				Why do you feel that way?<br>
				//program scans input<br>
				Tell me more about "".<br>
				//program scans input<br>
				Wow, do you want to talk more? Type yes or no.<br>
				//program scans input. If user says yes, conversation loops<br>
				//else, continue to next part of conversation<br>
				Okay, we can talk more next time.<br>
				Goodbye!</p>
			</p>
			</blockquote>
		</div>
	    </div>
</div>

	    