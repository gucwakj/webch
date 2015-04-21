<div id="lessonPlanContainer">
<?php $pageName = "8"; ?> <!--CHANGE THIS-->
<?php include 'ch2M.php'; ?>
    <div class="lesson"> 
		    <h3> Lesson 8: Making Money!</h3>    <!--CHANGE THIS-->
        <p>Mai earns $9.50 per hour at her after-school job. How many hours does she have to work to earn $237? How can we use a <span class="types">while</span> loop answer this?</p>
    <p>As usual we will need some variables</p> <p>Type:
        <br /><code>&nbsp;&nbsp;&nbsp;<span class="types">double</span> earnings = 0;</code>
        <br /><code>&nbsp;&nbsp;&nbsp;<span class="types">int</span> hours = 0;</code>
        </p>
<p>The code below is the <span class="types">while</span> loop. It will count the hours while earnings is is less than or equal to 237</p>
<code>
<span class="keywords2">while</span> (earnings <= 237) <br />
    {<br />
&nbsp;&nbsp;&nbsp;
    earnings = earnings + 9.5;<br />
&nbsp;&nbsp;&nbsp;
    hours = hours + 1;<br />
    }<br />
    //prints the answer to the screen<br />
    <span class="keywords2">printf</span>(<span class="quotesmarks">"Mai must work %d hours."</span>, hours);
</code>
<p>What happens if you change the pay rate or the paycheck amount?</p>
</div>
</div>
</div>
</div>
	    
