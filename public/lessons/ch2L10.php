<div id="lessonPlanContainer">
<?php $pageName = "10"; ?> <!--CHANGE THIS-->
<?php include 'ch2M.php'; ?>
    <div class="lesson"> 
		    <h3> Lesson 10: Game 2.0</h3>    <!--CHANGE THIS-->
        <p>Now we'll take our game from the last lesson and make it even better! Can you go through and add comments to explain what each portion does?</p>
         <br /><code><span class="types">int</span> x, guess;</code>
<br/>
    
<code>x = <span class="keywords2">randint</span>(10,25); //Generates a random number between 10 and 25</code><br />
<code><span class="keywords2">printf</span>(<span class="quotesmarks">"I am thinking of a number between 10 and 25, Guess my number: "</span>); </code></p>
<code><span class="keywords2">scanf</span>(<span class="quotesmarks">"%d"</span>,&guess);</code></p>
<code>
<span class="keywords2">while</span> (guess != x) <br />
    {<br />
&nbsp;&nbsp;&nbsp;
    <span class="keywords2">if</span> (guess <  x) {<br />
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
    <span class="keywords2">printf</span>(<span class="quotesmarks">"Too low; Try again!"</span>);
    <br />
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
    <span class="keywords2">scanf</span>(<span class="quotesmarks">"%d"</span>,&guess);
    <br />
&nbsp;&nbsp;&nbsp;
    }<br />
&nbsp;&nbsp;&nbsp;
    <span class="keywords2">else if</span> (guess >  x) {<br />
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
    <span class="keywords2">printf</span>(<span class="quotesmarks">"Too high; Try again!"</span>);
    <br />
&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;
    <span class="keywords2">scanf</span>(<span class="quotesmarks">"%d"</span>,&guess);
    <br />
&nbsp;&nbsp;&nbsp;
    }<br />
    }<br />
    <span class="keywords2">printf</span>(<span class="quotesmarks">"You got it!! My number wass %d ."</span>, x);
</code>
</div>
</div>
</div>
</div>
	    
