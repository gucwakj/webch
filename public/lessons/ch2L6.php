<div id="lessonPlanContainer">
<?php $pageName = "6"; ?> <!--CHANGE THIS-->
<?php include 'ch2M.php'; ?>
    <div class="lesson"> 
		    <h3> Lesson 6: Programming with Loops</h3>    <!--CHANGE THIS-->
        <p>Lets learn something new. C uses a ‘<span class="types">while</span> loop’ to complete a repetitive task very quickly.  A <span class="types">while</span> loop performs a specified task over and over while a specified condition is true.</p>
    <p>First, we will need a variable to store our number.</p> <p>Type:
        <br /><code>&nbsp;&nbsp;&nbsp;<span class="types">int</span> number;</code>
        </p>
		    <p>That declared the variable that we will need. Next, we will ask the user to enter a number.</p>
<code><span class="keywords2">printf</span>(<span class="quotesmarks">"enter a number between 1 and 15: "</span>); </code></p>
<code><span class="keywords2">scanf</span>(<span class="quotesmarks">"%d"</span>,&number);</code></p>
<p>The code below is the <span class="types">while</span> loop. It will run while number is greater than or equal to 1</p>
<code>
<span class="keywords2">while</span> (number >=1) <br />
    {<br />
    &nbsp;&nbsp;&nbsp;
<span class="keywords2">printf</span>(<span class="quotesmarks">"%d \n"</span>,number);
    <br />
    &nbsp;&nbsp;&nbsp;
    number = number -1;
    <br />
    }<br />
    <span class="keywords2">printf</span>(<span class="quotesmarks">"Blastoff!!"</span>);
</code>
<p>What happens if you change the 1 in '<code>number >=1</code>' or in '<code>number = number -1;</code>'?<br /> What happens if you put '<code><span class="keywords2">printf</span>(<span class="quotesmarks">"Blastoff!!"</span>);</code>' before the '}'?</p>
</div>
</div>
</div>
</div>
	    
