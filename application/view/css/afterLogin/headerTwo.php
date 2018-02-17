*{
    margin: 0px;
    padding: 0px;
    text-decoration: none;
	border: none;
    outline: none;
}

body{
	background-color: #f6f6f6;
    font-family: Arial, Verdana, sans-serif;
}

a{
    color: black;
}

#header{
    height: 100px;
    width: 100%;
    min-width: 1009px;
    background-color: #ffffff;
}

#hCenter{ /* headerCenter */
    width: 100%;
    height: 100%;
    margin-left: auto;
    margin-right: auto;
}

#logo{
    width: 200px;
    height: 55px;
	float: left;
	text-align: center;
	margin-top: 20px;
	padding-top:5px;
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

.post{
    display: none;
}

#commonWall, 
#lecture,
#timetable,
#exit,
#personalArea{
	text-align: center;
	font-size: 23px;
	margin-top: 30px;
	border-right: 1px solid gray;
	cursor: pointer;
    background-color: white;
    padding-top: 5px;
    height: 35px;
    letter-spacing: 2px;
}

#commonWall a:hover,
#lecture a:hover,
#timetable a:hover,
#exit a:hover,
#personalArea a:hover{
    color: #9e9e9e;
    text-decoration: underline;
}

#commonWall{
    width: 180px;
	float: left;
}

#lecture{
    width: 100px;
	float: left;
}

#timetable{
    width: 170px;
	float: left;
}

#exit{
    width: 100px;
	float: right;
}

#personalArea{
    width: 240px;
	float: right;
    padding-right: 10px;
}

#enter a{
	color: #ff8569;
}

#body{
    height: 100%;
    width: 100%;
    background-color: #f6f6f6;
    padding-top: 70px;
}

#message,
#test,
#lectureTeacher{
    text-align: center;
    font-size: 23px;
    margin-top: 30px;
    border-right: 1px solid gray;
    cursor: pointer;
    background-color: white;
    padding-top: 5px;
    height: 35px;
    letter-spacing: 2px;
}

#message a:hover,
#test a:hover,
#lectureTeacher a:hover{
    color: #9e9e9e;
    text-decoration: underline;
}

#message{
    width: 180px;
    float: left;
}

#test{
    width: 100px;
    float: left;
}

#lectureTeacher{
    width: 150px;
    float: left;
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