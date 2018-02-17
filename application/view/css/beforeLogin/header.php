*{
    margin: 0px;
    padding: 0px;
    text-decoration: none;
    border: none;
    outline: none;
}

body{
	background-color: #f6f6f6;
}

#header{
    height: 100px;
    width: 100%;
    background-color: #ffffff;
}

#hCenter{ /* headerCenter */
    width: 1000px;
    height: 100%;
    margin-left: auto;
    margin-right: auto;
}

#logo{
    width: 200px;
    height: 75px;
	float: left;
	text-align: center;
	padding-top:25px;
}

#doc,#stud{
	font-size: 40px;
	font-weight: 600;
}

#doc{
	color: #bfbfbf;
}

#stud{
	color: #ff0000;
}

#manual{
    width: 200px;
    height: 60px;
	float: left;
	text-align: center;
	padding-top: 40px;
	font-size: 20px;
}

#registration{
	width: 190px;
	height: 34px;
    background-image: linear-gradient(#8bcc62, #5abb52);
	text-align: center;
	float: right;
	border-radius: 5px;
	padding-top: 10px;
	margin-top: 30px;
	font-size: 23px;
	cursor: pointer;
}

#registration a{
    color: white;
}

#registration:hover{
    background-image: linear-gradient(#a6ec7a, #63cc5a);
}

#registration:active{
    background-image: linear-gradient(#5abb52, #8bcc62);
}


#enter{
    width: 60px;
    height: 45px;
	float: right;
	text-align: center;
    margin-top: 45px;
	font-size: 15px;
	color: #ff8569;
    cursor: pointer;
    background-color: white;
}

#enter a{
	color: #ff8569;
}

#enter a:hover{
    color: #ffb5a4;
}

#enter a:active{
    color: #de2900;
}

#body{
    height: 100%;
    width: 100%;
    background-color: #f6f6f6;
    padding-top: 70px;
}

.invisible{
    display: none;
}

#blackout {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    overflow: auto;
    opacity: 0.4;
    background-color: black;
    display: none;
}

#block {
    width: 400px;
    height: 120px;
    position: absolute;
    top: 50%;
    left: 45%;
    opacity: 1;
    margin: -125px 0 0 -125px;
    background-color: white;
    border: 1px solid black;
    border-radius: 15px;
    display: none;
}

#deleteText{
    text-align: center;
    font-size: 22px;
    margin-top: 15px;
}

#cancel, #doDelete{
    text-align: center;
    margin-top: 15px;
    width: 140px;
    height: 30px;
    font-size: 22px;
    border: 1px solid black;
    border-radius: 5px;
    float: left;
    cursor: pointer;
}

#cancel{
    margin-left: 25px;
}

#doDelete{
    margin-left: 35px;
}