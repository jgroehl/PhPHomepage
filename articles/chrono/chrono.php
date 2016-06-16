<!DOCTYPE HTML>
<html>
	<head>
		<title>Strata by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body id="top">

		<?php include '../../templates/articleheader.php';?>

		<div id="main">
		<h2>
		Measuring time using std::chrono
		</h2>
		14.06.2016
		
		<div id="introduction">
		<h3> Introduction </h3>
		The std::chrono time library was introduced with c++11. 
		It is a utility library, containing many convenience functionalities
		which enable the tracking of time. <br /><br />
		Three time concepts are introduced within this library: <br />
		<i><b>Durations</b></i> - Durations measure time spans. <br />
		<i><b>Time Points</b></i> - Time Points are a reference to a certain point in time. They are measured as a duration since an epoch. An epoch is a fixed time point known by all time objects using the same clock. <br />
		<i><b>Clocks</b></i> - A clock is a framework, which relates a time point to real time. <br />
		<br />
		The introduction of this library was done mainly, to ensure the existance of 
		a platform independent way of time measurement within the standard library.
		The ctime library has some precision issues on sime platforms and results may
		not be used directly in portable programs. A huge advantage of the chrono library
		is the generic handling of different time measures (like milliseconds, minutes, etc),
		without the user having to worry about conversions.
		
		</div>
		
		<div id="example">
		<h3> Examples </h3>
		Let us start with an example on how time can be measured using standard c libraries: <br />
		
<pre><code>#include &lttime.h&gt 
time_t timeBefore = time(NULL);

//Code here

time_t timeAfter = time(NULL);
long timeTotal = difftime(timeAfter, timeBefore);
std::cout &lt&lt "Time elapsed in seconds: " &lt&lt timeTotal &lt&lt std::endl;
</code></pre>
		
		The following lines show an example implementation of how time can be measured using std::chrono. <br />
<pre><code>#include &ltchrono&gt
auto timeBefore = std::chrono::high_resolution_clock::now();

//Code here

auto timeAfter = std::chrono::high_resolution_clock::now();
long timeTotal = std::chrono::duration_cast&ltstd::chrono::milliseconds&gt(timeAfter-timeBefore).count();
std::cout &lt&lt "Time elapsed: " &lt&lt timeTotal &lt&lt std::endl;
</code></pre>

		Of course, any time measure can be used, according to the needs of the programmer. This flexibility creates the biggest benefit.
		You do not have to worry about explicit time conversions. Other measurable time precisions are:
		<ul>
		<li>std::chrono::nanoseconds</li>
		<li>std::chrono::milliseconds</li>
		<li>std::chrono::seconds</li>
		<li>std::chrono::minutes</li>
		</ul>

		And then, finally, here is a simple one-liner showing of how to get a time stamp with the current system time in milliseconds.<br />
<pre><code>long GetCurrentTimeStamp()
{
 return std::chrono::duration_cast&ltstd::chrono::milliseconds&gt(std::chrono::high_resolution_clock::
 now()).count();
}
</code></pre>
		</div>
		
		<div id="conclusion">
		
		</div>
		
		<div id="references">
		<h3> References </h3>
		
		[1] <a href="http://en.cppreference.com/w/cpp/chrono" target="_blank"> cppreference.com std::chrono </a><br />
		[2] <a href="http://www.cplusplus.com/reference/chrono/" target="_blank"> cplusplus.com std::chrono </a><br />
		[3] <a href="http://www.mitk.org/images/e/e4/20150624_chrono.pdf" target="_blank"> MITK Bugsquashing Seminar </a></br />
		[4] <a href="http://www.cplusplus.com/reference/ctime/time/" target="_blank"> cplusplus.com ctime </a><br />
		</div>

		<br />
		
		<?php include '../../templates/footer.php';?>

		<!-- Scripts -->
		<script src="../../assets/js/jquery.min.js"></script>
		<script src="../../assets/js/jquery.poptrox.min.js"></script>
		<script src="../../assets/js/skel.min.js"></script>
		<script src="../../assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="../../assets/js/main.js"></script>

	</body>
</html>