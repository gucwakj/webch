<div id="lessonPlanContainer">
<?php $pageName = "2"; ?> <!--CHANGE THIS-->
<?php include 'ch2M.php'; ?>
    <div class="lesson"> 
		    <h3> Lesson 2: Multiplication</h3>    <!--CHANGE THIS-->
		    <p>The next math topic that we can learn in C is multiplication. Lets write a program to multiply some numbers!</p>
    <p>First, we will need some variables to store our numbers. Since we will be using whole numbers we can declare the variables as integers.</p> <p>Type:<code>&nbsp;&nbsp;&nbsp;<span class="types">int</span> firstnumber, secondnumber,product;</code></p>
		    <p>That declared the integer variables that we will need. Next, we will get values for these variables.</p>
            <code>&nbsp;&nbsp;&nbsp;<span class="keywords2">printf</span>(<span class="quotesmarks">"enter the first number"</span>); //prints to the screen the message</code></p>
    <code>&nbsp;&nbsp;&nbsp;<span class="keywords2">scanf</span>(<span class="quotesmarks">"%d \n"</span>,&firstnumber); //reads user input and stores it into the variable</code></p>

<code>&nbsp;&nbsp;&nbsp;<span class="keywords2">printf</span>(<span class="quotesmarks">"enter the second number"</span>); //prints to the screen the message</code>
<br />
    <code>&nbsp;&nbsp;&nbsp;<span class="keywords2">scanf</span>(<span class="quotesmarks">"%d \n"</span>,&secondnumber); //reads user input and stores it into the variable</code>
<br />
<code>product = firstnumber*secondnumber; //compute the product</code>
<br />
<code>&nbsp;&nbsp;&nbsp;<span class="keywords2">printf</span>(<span class="quotesmarks">"%d x %d = %d\n",firsnumber,secondnumber,product</span>); //prints to the screen the product</code>
		</div>
</div>
</div>
</div>
	    	    