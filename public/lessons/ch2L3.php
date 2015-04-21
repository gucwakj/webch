<div id="lessonPlanContainer">
<?php $pageName = "3"; ?> <!--CHANGE THIS-->
<?php include 'ch2M.php'; ?>
    <div class="lesson"> 
		    <h3> Lesson 3: How tall are you?</h3>    <!--CHANGE THIS-->
		    <p>Now that we know how to add and multiply lets put those skills to use! We will make a simple calculator that takes your height in feet and inches and converts it.</p>
    <p>First, we will need some variables to store our numbers. Use <span class="types">int</span> and <span class="types">double</span> types to hold integer and decimal values respectivly.</p> <p>Type:
        <br /><code>&nbsp;&nbsp;&nbsp;<span class="types">int</span> feet, inches;</code>
<br /><code>&nbsp;&nbsp;&nbsp;<span class="types">double</span> totalInches, totalFeet;</code>
        </p>
		    <p>That declared the variables that we will need. Next, we will ask the user for values to store in these variables.</p>
<code><span class="keywords2">printf</span>(<span class="quotesmarks">"enter your height as follows: feet, inches: "</span>); </code>
<code><span class="keywords2">scanf</span>(<span class="quotesmarks">"%d,%d"</span>,&feet, &inches);</code></p>

Finally, calculate the result and display the output.
<p>
<code>
//compute the total inches and feet<br />
totalInches = feet*12 + inches;<br />
totalFeet = feet + inches/12.0;</code>
<br />
<code>
//Prints the final results<br />
    <span class="keywords2">printf</span>(<span class="quotesmarks">"You are %lf inches tall. \n",totalInches</span>);<br />
<span class="keywords2">printf</span>(<span class="quotesmarks">"You are %lf feet tall. \n",totalFeet</span>);
</code>
		</div>
</div>
</div>
</div>
	    
