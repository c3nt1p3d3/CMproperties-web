<?php
require('login.php');
?>






<html>
<title>
    Administrator panel
</title>

<style>

body {
    background-color: #efefef;
}



form {
    margin-left: 490px;
}

#table_big{
    margin-top: -40px;
}


#space {
    height: 250px;
}


#left {
    text-align: left;
    font-size: 37px;
    font-weight: bold;
    margin-top: 50px;
    margin-left: 150px;
    margin-right: 850px;
    padding: 5px;
    display: inline-block;
    border-radius: 10px;
    box-shadow: inset 0 0 10px rgba(0,0,0,0.85);
    float: left;
}


#right {
    text-align: left;
    font-size: 37px;
    font-weight: bold;
    margin-top: 50px;
    margin-right: 150px;
    margin-left: 150px;
    padding: 5px;
    display: inline-block;
    border-radius: 10px;
    box-shadow: inset 0 0 10px rgba(0,0,0,0.85);
    float: right;
}

#cell {
    background-color: #dfdfdf;
    text-align: center;
    display: table-cell;
    vertical-align: middle;
    font-size: 27px;
    font-weight: bold;
    margin-right: 15px;
    margin-left: 15px;
    margin-bottom: 15px;
    padding: 5px;
    height: 150px;
    width: 150px;
    border-radius: 10px;
    box-shadow: inset 0 0 10px rgba(0,0,0,0.85);
}






#cell:hover {
    box-shadow: 0 0 10px rgba(0,0,0,0.85);
    background-color: #dfdfdf;
}


#right:hover {
    box-shadow: 0 0 10px rgba(0,0,0,0.85);
}


a {
    color: #838383;
    /*color: #804f63;*/
    text-decoration: none;
    vertical-align: text-top;
}

a:hover {
    /*color: #FFFFFF;*/
    /*color: #B97E82;*/
    color: #232323;
}

</style>




<body>

<div id="space"></div>

<table id="table_big" align="center" width="60%" height="35%">
<tr>

<td>
<a href="http://www.cmproperties.es/">
<div id="cell">Index
</div>
</a>
</td>


<td>
<a href="http://www.cmproperties.es/create.php">
<div id="cell">Create
</div>
</a>
</td>

<td>
<a href="http://www.cmproperties.es/change.php">
<div id="cell">Change
</div>
</a>
</td>



</tr>
<tr>



<td>
<a href="https://us9.admin.mailchimp.com/">
<div id="cell">Mailchimp
</div>
</a>
</td>


<td>
<a href="http://www.cmproperties.es/create_rent.php">
<div id="cell">Create Rent
</div>
</a>
</td>



<td>
<a href="http://www.cmproperties.es/change_rent.php">
<div id="cell">Change Rent
</div>
</a>
</td>


</tr>
<tr>




<td>
<a href="http://www.idealista.com/webtool/home">
<div id="cell">Idealista
</div>
</a>
</td>


<td>
<a href="http://www.cmproperties.es/xmlSelect.php">
<div id="cell">XML
</div>
</a>
</td>


<td>
<a href="http://www.cmproperties.es/phpmyadmin">
<div id="cell">PHPMY ADMIN
</div>
</a>
</td>


</tr>




</table>



</body>



</html>
