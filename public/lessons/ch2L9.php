<div id="lessonPlanContainer">
<?php $pageName = "9"; ?> <!--CHANGE THIS-->
<?php include 'ch2M.php'; ?>
    <div class="lesson"> 
		    <h3> Lesson 9: Random Number Generation</h3>    <!--CHANGE THIS-->
        <p>Now we'll take <span class="types">while</span> loops use add random numbers to make it a game! Ch has a function called <span class="keywords2">randint</span>() that will pick an random integer between any two values that you specify</p>
    <p>We only need two vaiables for this game.</p> <p>Type:
        <br /><code>&nbsp;&nbsp;&nbsp;<span class="types">int</span> x, guess;</code>
        </p>
		    <p>Next is where the game starts, we will generate the random numberr then ask the user to guess it.</p>
<code>x = <span class="keywords2">randint</span>(10,25); //Generates a random number between 10 and 25</code><br />
<code><span class="keywords2">printf</span>(<span class="quotesmarks">"Im thinking of a number between 10 and 25, Guess my number: "</span>); </code></p>
<code><span class="keywords2">scanf</span>(<span class="quotesmarks">"%d"</span>,&guess);</code></p>
<p>The code below is the <span class="types">while</span> loop. It ask the user to keep trying until they get it right.</p>
<code>
<span class="keywords2">while</span> (guess != x) <br />
    {<br />
&nbsp;&nbsp;&nbsp;
    <span class="keywords2">printf</span>(<span class="quotesmarks">"Try again!"</span>);
    <br />
&nbsp;&nbsp;&nbsp;
    <span class="keywords2">scanf</span>(<span class="quotesmarks">"%d"</span>,&guess);
    <br />
    }<br />
    <span class="keywords2">printf</span>(<span class="quotesmarks">"You got it!! My number wass %d ."</span>, x);
</code>
</div>
</div>
</div>
</div>
	    
