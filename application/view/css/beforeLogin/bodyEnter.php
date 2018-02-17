
/* Стиль главного элемента тела */
#bCenterEnter{  /* bodyCenterEnter */
	width: 730px;
	height: 350px;
	margin-left: auto;
	margin-right: auto;
	background: linear-gradient(top, bottom, #f6f6f6, white);
	border-radius: 15px;
}

/* Стиль заголовка тела */
#bTextEnter{    /* bodyTextEnter */
	width: 100%;
	height: 40px;
	font-size: 30px;
	margin-left: 230px;
	padding-top: 10px;
	margin-bottom: 10px;
}

/* Стиль отдельного элемента на главном элементе */
.bEnter{    /* bodyEnter */
	width: 460px;
	height: 55px;
	margin-left: auto;
	margin-right: auto;
	margin-bottom: 15px;
}

/* Стиль заголовка отдельного элемента тела */
.bEText{    /* bodyEnterText */
	float: left;
	font-size: 25px;
	width: 90px;
	padding-top: 10px;
}

/* Стиль поля для записи текста отдельного элемента тела */
.bEField{   /* bodyEnterField */
	float: left;
	height: 40px;
	width: 319px;
	border: 4px solid #eeeeee;
	border-radius: 5px;
	font-size: 20px;
	padding-right: 5px;
}

/* Стиль поля для записи текста отдельного элемента тела в фокусе */
.bEField:focus{
	border: 4px solid #e0f1fc;
}

/* Стиль элемента вопроса о запоминании данных тела */
#bEnterFunc{
	width: 460px;
	height: 25px;
	margin-left: auto;
	margin-right: auto;
}

/* Стиль элемента вопроса о запоминании данных тела */
#bEnterMemory{
	float: left;
	margin-top: 5px;
	margin-left: 90px;
}

/* Стиль текста вопроса о запоминании данных тела */
#bEnterMemoryText{
	width: 160px;
	float: left;
	margin-left: 10px;
	margin-top: 3px;
	font-style: italic;
}

/* Стиль кнопки в главном элементе тела */
#bEnterSubmit{
	width: 344px;
	height: 55px;
	font-size: 15px;
    background-image: linear-gradient(#8bcc62, #5abb52);
	margin-top: 20px;
	margin-left: 215px;
	color: white;
	border-radius: 5px;
    cursor: pointer;
}

#bEnterSubmit:hover{
    background-image: linear-gradient(#a6ec7a, #63cc5a);
}

#bEnterSubmit:active{
    background-image: linear-gradient(#5abb52, #8bcc62);
}