	    <div id="lessonPlan">
<?php $pageName = "5"; ?>
            <?php include 'ch1M.php'; ?>
            <div class="lesson"> 
		    <h3> Lesson 5: Introduction to Plotting </h3>
		    <p>Using the <code>&lt;chplot.h&gt;</code> header file, code can be used to plot mathematic functions. Including the header file with <code>#include&lt;chplot.h&gt;</code> lets us use plotting functions in our code. </p>
		    
		    <p>First we declare A variable to be used in our plotting, including the class <code>CPlot</code>, then we assign the labels to the axis <code>y</code>, and finally we use the plotting function to add data points  and then create the plot with <code>plot.plotting()</code>
		    
		    <p>As an example, try entering the following: </p>
		    
		    <code><pre>
#include&lt;chplot.h&gt;
<span class="keywords2">CPlot</span> plot;
plot.mathCoord();
plot.title("Temperature Relation");
plot.label(PLOT_AXIS_X, "Fahrenheight");
plot.label(PLOT_AXIS_Y, "Celsius");
    
/*data points for plotting*/
plot.point(-10,-23.33);
plot.point(20,-6.67);
plot.point(50,10.00);
plot.point(80,26.67);
plot.point(110,43.33);
plot.plotting();
</pre></code>

		</div>
	    </div>
</div>
