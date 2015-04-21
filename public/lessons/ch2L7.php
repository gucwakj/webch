<div id="lessonPlanContainer">
<?php $pageName = "7"; ?> <!--CHANGE THIS-->
<?php include 'ch2M.php'; ?>
    <div class="lesson"> 
		    <h3> Lesson 7: Counting with Loops</h3>    <!--CHANGE THIS-->
        <p>How else can we use ‘<span class="types">while</span> loops’?A <span class="types">while</span> loop is great for counting by multiples.</p>
    <p>First, we will need a couple counter variables.</p> <p>Type:
        <br /><code><span class="types">int</span> x,counter;
        <br />//assign values to these variables
        <br />x = 5;
        <br />counter = 0;
</code>
        </p>
<p>The code below is the <span class="types">while</span> loop. It will run while number is less than 50</p>
<code>
<span class="keywords2">while</span> (x < 50) <br />
    {<br />
&nbsp;&nbsp;&nbsp;
    <span class="keywords2">printf</span>(<span class="quotesmarks">"%d \n"</span>,x);
    <br />
&nbsp;&nbsp;&nbsp;
    x = x + 3; <br />
&nbsp;&nbsp;&nbsp;
    counter = counter +1;<br />
    }<br />
    <span class="keywords2">printf</span>(<span class="quotesmarks">"There are %d multiples of 3 between 5 and 100."</span>, counter);
</code>
<p>What happens if you change some of the numbers and variables in this program?</p>
</div>
</div>
</div>
</div>
	    
