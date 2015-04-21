<div id="lessonPlanContainer">
<?php $pageName = "5"; ?> <!--CHANGE THIS-->
<?php include 'ch2M.php'; ?>
    <div class="lesson"> 
		    <h3> Lesson 5: Conditional Logic</h3>    <!--CHANGE THIS-->
		    <p>Lets learn something new. C uses conditional logic to ‘branch out’ and handle all possible scenarios to solve a problem. Run the program below three times, guessing above, below, and on 2272</p>
    <p>First, we will need a variable to store our number.</p> <p>Type:
        <br /><code>&nbsp;&nbsp;&nbsp;<span class="types">int</span> guess;</code>
        </p>
		    <p>That declared the variables that we will need. Next, we will ask the user to guess.</p>
<code><span class="keywords2">printf</span>(<span class="quotesmarks">"Guess the average number of texts an American teen sends and receives each month: "</span>); </code></p>
<code><span class="keywords2">scanf</span>(<span class="quotesmarks">"%d"</span>,&guess);</code></p>
<p>The code below checks to see if the guess was 2272. If it is a congrats message will be printed to the user</p>
<code>
<span class="keywords2">if</span> (guess == 2272) <br />
    <span class="keywords2">printf</span>(<span class="quotesmarks">"You got it!! \n"</span>);
</code>
<p>If the user does not guess exactly 2272 the code will move on to the next section. The code below will check if the user entered less than 2272.</p>
<code>
<span class="keywords2">else if</span> (guess < 2272) <br />
    <span class="keywords2">printf</span>(<span class="quotesmarks">"Too low; The average american teen sends and recieves 2272 texts per month. \n"</span>);
</code>
<p>If the user does not guess exactly 2272 or below the code will move on to the next section. The code below will check if the user entered more than 2272.</p>
<code>
<span class="keywords2">else if</span> (guess > 2272) <br />
    <span class="keywords2">printf</span>(<span class="quotesmarks">"Too high; The average american teen sends and recieves 2272 texts per month. \n"</span>);
</code>
<br />
</div>
</div>
</div>
</div>
	    