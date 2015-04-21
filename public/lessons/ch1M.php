<div id="lessonPlan">
<div id="guts">
<div class="navigation">
            <ul class="nav">
  			<li  id="left" class="lessonPlanNavLink" onclick= "lessonLink('index.php')">Home
            <li id="right">Course 1: Introduction to C Programming</li>
            
            </ul>
          </div>
<div class="navigation">
            <ul class="nav">
                <li class="">Lessons
                <li <?php if ($pageName=="1") echo 'id="current"'; ?> class="lessonPlanNavLink" onclick= "lessonLink('lessons/ch1L1.php')">1
                <li <?php if ($pageName=="2") echo 'id="current"'; ?> class="lessonPlanNavLink" onclick= "lessonLink('lessons/ch1L2.php')">2
                <li <?php if ($pageName=="3") echo 'id="current"'; ?> class="lessonPlanNavLink" onclick= "lessonLink('lessons/ch1L3.php')">3
                <li <?php if ($pageName=="4") echo 'id="current"'; ?> class="lessonPlanNavLink" onclick= "lessonLink('lessons/ch1L4.php')">4
                <li <?php if ($pageName=="5") echo 'id="current"'; ?> class="lessonPlanNavLink" onclick= "lessonLink('lessons/ch1L5.php')">5
            </ul>
          </div>
