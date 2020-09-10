<!Doctype html>
<html>
<body>
<style>
#nav {
list-style:none inside;
margin:0;
padding:0;
text-align:center;
}
#nav li {
display:block;
position:relative;
float:left;
background: #green; /* menu background color */
}
#nav li a {
display:block;
padding:0;
text-decoration:none;
width:200px; /* this is the width of the menu items */
line-height:35px; /* this is the hieght of the menu items */
color:#ffffff; /* list item font color */
}
#nav li li a {font-size:80%;} /* smaller font size for sub menu items */
#nav li:hover {background:#003f20;} /* highlights current hovered list item and the parent list items when hovering over sub menues */
#nav ul {
position:absolute;
padding:0;
left:0;
display:none; /* hides sublists */
}
#nav li:hover ul ul {display:none;} /* hides sub-sublists */
#nav li:hover ul {display:block;} /* shows sublist on hover */
#nav li li:hover ul {
display:block; /* shows sub-sublist on hover */
margin-left:200px; /* this should be the same width as the parent list item */
margin-top:-35px; /* aligns top of sub menu with top of list item */
}


#nav li li li a {font-size:80%;} /* smaller font size for sub menu items */
#nav li:hover {background:#003f20;} /* highlights current hovered list item and the parent list items when hovering over sub menues */
#nav ul {
position:absolute;
padding:0;
left:0;
display:none; /* hides sublists */
}
#nav li:hover ul ul ul {display:none;} /* hides sub-sublists */
#nav li:hover ul {display:block;} /* shows sublist on hover */
#nav li li li:hover ul {
display:block; /* shows sub-sublist on hover */
margin-left:200px; /* this should be the same width as the parent list item */
margin-top:-35px; /* aligns top of sub menu with top of list item */
}
</style>

<ul id="nav">
<li><a href="#">Home</a></li>
<li><a href="">Faculty</a>
<ul>
<li><a href="?a=faculty_add">Faculty Registration</a></li>
<li><a href="?a=view2">Faculty View</a></li>
</ul>


 



<li><a href="#">Result</a>
<ul>



<li><a href="#">View</a>
<ul>
<li><a href="?a=view_aca_civil">CIVIL</a></li>
<li><a href="?a=view_aca_cse">CSE</a></li>
<li><a href="?a=view_aca_ece">ECE</a></li>
<li><a href="?a=view_aca_eee">EEE</a></li>
<li><a href="?a=view_aca_it">IT</a></li>
<li><a href="?a=view_aca_mech">MECH</a></li>
</ul>

<li><a href="?a=academy">Update</a>

</ul>
</li>

<li><a href="#">Students</a>
<ul>
    <li><a href="?a=student_add">Student Registartion</a></li>
    <li><a href="?a=view">Students View</a></li>
</ul>

</li>
<li><a href="#">Department</a>
<ul>
    <li><a href="?a=department_add">Department Admission</a></li>
    <li><a href="?a=view3">View Admission</a></li>
</ul>

</li>
<li><a href="#">Hostel</a>
<ul>
    <li><a href="?a=hostel_add">Add Hosteller</a></li>
    <li><a href="?a=view_ho_1">View Hostellers</a></li>
</ul>

</li>


</body>
</html>

	