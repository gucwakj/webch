<div id="lessonPlanContainer">
<?php $pageName = "4"; ?> <!--CHANGE THIS-->
<?php include 'ch2M.php'; ?>
    <div class="lesson"> 
		    <h3> Lesson 4: Averages</h3>    <!--CHANGE THIS-->
		    <p>Lets make a simple average calculator using out addition and multiplication skills.</p>
    <p>First, we will need some variables to store our numbers.</p> <p>Type:
        <br /><code>&nbsp;&nbsp;&nbsp;<span class="types">double</span> first, second, third, average;</code>
        </p>
		    <p>That declared the variables that we will need. Next, we will ask the user for values to store in these variables.</p>
            <code>&nbsp;&nbsp;&nbsp;<span class="keywords2">printf</span>(<span class="quotesmarks">"enter three numbers seperated by commas: "</span>); </code></p>
    <code>&nbsp;&nbsp;&nbsp;<span class="keywords2">scanf</span>(<span class="quotesmarks">"%lf,%lf,%lf"</span>,&first, &second, &third);</code></p>

<code>
//compute average<br />
average = (first + second + third)/3.0;</code>
<br />
<code>
//Prints the final results<br />
<span class="keywords2">printf</span>(<span class="quotesmarks">"Average: %lf \n",average</span>);<br />
</code>
<p>Can you modify the program so that it computes the average of 5 numbers?</p>
		</div>
</div>
</div>
</div>
	    