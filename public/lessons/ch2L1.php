<div id="lessonPlanContainer">
    <?php $pageName = "1"; ?>
<?php include 'ch2M.php'; ?>
    <div class="lesson"> 
		    <h3> Lesson 1: Addition</h3>
		    <p>The most basic math that we can learn in C is addition. Lets write a program to add some numbers!</p>
    <p>First, we will need some variables to store our numbers. Since we will be using whole numbers we can declare the variables as integers.</p> <p>Type:<code>&nbsp;&nbsp;&nbsp;<span class="types">int</span> x, y, z;</code></p>
		    <p>That declared the integer variables that we will need. Next, assign values to these variables.</p>
            <code>
                x = 4;<br />
                y = 2;<br />
                z = 6;<br />
                z = 2;<br />
            </code>
            <p>When you run the program you will notice that <code>z</code> will be 2 since it is over written the second time it is assigned.</p>
		    <p>In the last course we learned how to use the <code class="keywords2">printf</code>() function. Now we will use it to display variables.</p>
            <p>Type: <code>&nbsp;&nbsp;&nbsp;<span class="keywords2">printf</span>(<span class="quotesmarks">"%d \n"</span>, x+y+z);</code></p>
		    <p>The <span class="quotesmarks">"%d"</span> is the place holder for an integer value. This value comes from the second half of the function <span class="quotesmarks">"x+y+z"</span>. And the <span class="quotesmarks">"\n"</span> places the cursor on a new line.</p>
		</div>
</div>
</div>
</div>
	    